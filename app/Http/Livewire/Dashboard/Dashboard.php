<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\SplitTest;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $splitTests = auth()->user()->splitTests()->withCount('splitCycles')->latest()->get();

        return view('livewire.dashboard.dashboard', [
            'splitTests' => $splitTests
        ]);
    }
}
