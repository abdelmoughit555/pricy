<?php

namespace App\Listeners;

use App\Events\SplitTestEnded;
use App\Events\SplitTestEndedEvent;
use App\Models\SplitCycle;
use App\Models\SplitTest;

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

        $splitTestStatus = "";

        if ($status->contains(SplitCycle::RUNNING)) {
            $splitTestStatus = SplitTest::RUNNING;
        } else if (
            $status->contains(SplitCycle::FINISHED) && !($status->contains(SplitCycle::RUNNING) || $status->contains(SplitCycle::PENDING))
        ) {
            $splitTestStatus = SplitTest::FINISHED;
        }

        $splitTest->update([
            'status' => $splitTestStatus
        ]);
    }
}
