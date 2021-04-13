<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Models\SplitTest;
use Livewire\Component;

class ShowSplitTestColumn extends Component
{
    public $splitCycle;
    public $splitTestId;

    public function setWinner()
    {
        $splitTest = SplitTest::where('uuid', $this->splitTestId)->first();

        $splitTest->splitCycles->each(function ($splitCycle) {
            if ($splitCycle->is_winner) {
                $splitCycle->update([
                    'is_winner' => false
                ]);
            }
        });

        $this->splitCycle->update([
            'is_winner' => true
        ]);

        $this->emitUp('refetchSplitTest');
    }
    public function render()
    {
        return view('livewire.experiments.split-test.show-split-test-column', [
            'splitCycle' => $this->splitCycle
        ]);
    }
}
