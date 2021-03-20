<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use Livewire\Component;

class Steps extends Component
{
    public $currentStep = 2;
    public $totalSteps = 2;
    public $isLoading = false;

    protected $listeners = ['incrementStep' => 'nextStep'];

    public function nextStep($productId)
    {
        $this->emit('fetchProductId', $productId);
        $this->currentStep = 2;
    }

    public function render()
    {
        return view('livewire.experiments.split-test.steps');
    }
}