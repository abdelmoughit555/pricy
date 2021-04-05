<?php

namespace App\Events;

use App\Models\SplitTest;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SplitTestEndedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $splitTest;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SplitTest $splitTest)
    {
        $this->splitTest = $splitTest;
    }
}
