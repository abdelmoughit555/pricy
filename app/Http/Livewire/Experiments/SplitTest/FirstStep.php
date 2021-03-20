<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use Livewire\Component;

class FirstStep extends Component
{
    public function render()
    {
        $products = auth()->user()->products()->get();

        return view('livewire.experiments.split-test.first-step', [
            'products' => $products
        ]);
    }
}
