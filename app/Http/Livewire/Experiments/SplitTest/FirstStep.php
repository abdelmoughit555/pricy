<?php

namespace App\Http\Livewire\Experiments\SplitTest;

use App\Models\SplitTest;
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

        $products = auth()->user()->products()->latest()->whereDoesntHave('splitTests', function ($query) {
            $query->whereIn('status', [SplitTest::PENDING, SplitTest::RUNNING]);
        })->where('title', 'like', $searchTearm)->paginate($this->perPage);

        return view('livewire.experiments.split-test.first-step', [
            'products' => $products,
        ]);
    }
}
