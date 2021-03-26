<?php

namespace App\Http\Livewire\Experiments;

use Livewire\Component;

class Tutorial extends Component
{
    public $step  = 1;
    public $totalSteps = 3;

    public function next()
    {
        $this->step++;
    }

    public function previews()
    {
        $this->step--;
    }

    public function render()
    {
        return view('livewire.experiments.tutorial');
    }
}
