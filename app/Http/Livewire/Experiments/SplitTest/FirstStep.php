<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use Livewire\Component;

class FirstStep extends Component
{
    public $perPage = 17;
    public $searchTearm;

    public function loadMore()
    {
        $this->perPage += 17;
    }

    public function render()
    {
        $searchTearm = '%' . $this->searchTearm . '%';

        $products = auth()->user()->products()->where('title', 'like', $searchTearm)->paginate($this->perPage);

        return view('livewire.experiments.split-test.first-step', [
            'products' => $products,
        ]);
    }
}
