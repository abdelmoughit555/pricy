<?php

namespace App\Listeners;

use App\Events\SplitTestEnded;
use App\Events\SplitTestEndedEvent;
use App\Models\SplitCycle;

class SplitTestIsFinishedCheckListeners
{
    /**
     * Handle the event.
     *
     * @param  SplitTestEnded  $event
     * @return void
     */
    public function handle(SplitTestEndedEvent $event)
    {
        $splitTest = $event->splitTest;

        $status = $splitTest->splitCycles->map(function ($splitCycle) {
            return $splitCycle->status;
        });

        if (
            $status->contains(SplitCycle::RUNNING) ||
            $status->contains(SplitCycle::PENDING)
        ) return;

        $splitTest->update([
            'is_active' => false
        ]);
    }
}
