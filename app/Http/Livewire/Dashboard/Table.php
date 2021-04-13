<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $splitTests = auth()->user()->splitTests()->withCount('splitCycles')->withSum('orders', 'quantity')->paginate();

        return view('livewire.dashboard.table', [
            'splitTests' => $splitTests
        ]);
    }
}
