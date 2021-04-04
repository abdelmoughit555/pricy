<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\SplitTest;
use Livewire\Component;

class Column extends Component
{
    public $splitTest;

    public function mount(SplitTest $splitTest)
    {
        $this->splitTest = $splitTest;
    }

    public function render()
    {
        return view('livewire.dashboard.column');
    }
}
