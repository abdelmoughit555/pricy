<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Swipers extends Component
{
    public $swipers = [
        [
            'name' => 'Manage your prices',
            'image' => 'images/guy.png',
            'description' => 'With our Artificial intelligence you can create, optimize, and manage your prices. You can instruct the our Artificial intelligence to optimise on margin, and watch your margins grow',
        ],
        [
            'name' => 'One source of truth',
            'image' => 'images/woman.png',
            'description' => 'Set dynamic pricing rules to make sure that your store always has the most competitive and profitable prices.',
        ],
        [
            'name' => 'Make the right decision every time',
            'image' => 'images/clothes.png',
            'description' => "Handle an unlimited amount of competitor product price & stock availability information with Prisync's price tracking app.",
        ],
    ];

    public $currentStep = 1;
    public $totalStep = 3;

    public function next()
    {
        $this->currentStep < $this->totalStep ? $this->currentStep++ : $this->currentStep = 1;
    }

    public function previews()
    {
        $this->currentStep > $this->totalStep ?  $this->currentStep-- : $this->currentStep = $this->totalStep;
    }

    public function render()
    {
        return view('livewire.dashboard.swipers');
    }
}
