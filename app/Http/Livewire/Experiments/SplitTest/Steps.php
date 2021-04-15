<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use Livewire\Component;

class Steps extends Component
{
    public $currentStep = 1;
    public $totalSteps = 2;

    protected $listeners = ['incrementStep' => 'nextStep', 'finshSplitTest' => 'emitFinishSplit'];

    public function nextStep($productId)
    {
        $this->emit('fetchProductId', $productId);

        $this->currentStep++;
    }

    public function emitFinishSplit()
    {
        $this->emitTo('SecondStep', 'emitedFinishSplitTest');
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function render()
    {
        return view('livewire.experiments.split-test.steps');
    }
}
