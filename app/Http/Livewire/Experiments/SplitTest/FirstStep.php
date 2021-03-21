<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use Livewire\Component;

class FirstStep extends Component
{
    public $perPage = 17;

    public function loadMore()
    {
        $this->perPage += 17;
    }

    public function render()
    {
        $products = auth()->user()->products()->paginate($this->perPage);

        return view('livewire.experiments.split-test.first-step', [
            'products' => $products
        ]);
    }
}
