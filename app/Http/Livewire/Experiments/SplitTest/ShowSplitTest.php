<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Models\SplitCycle;
use Livewire\Component;

class ShowSplitTest extends Component
{
    protected $listeners = ['refetchSplitTest' => '$refresh'];

    public $splitTestId;
    public $splitCycles = [];

    public function mount()
    {
        $this->splitCycles = SplitCycle::whereHas('splitTest', function ($query) {
            $query->where('uuid', $this->splitTestId);
        })->get();
    }

    public function render()
    {
        return view('livewire.experiments.split-test.show-split-test');
    }
}
