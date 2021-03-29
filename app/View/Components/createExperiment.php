<?php

namespace App\View\Components;

use Illuminate\View\Component;

class createExperiment extends Component
{
    public $expirements = [
        'split_test' => [
            'name' => 'split test',
            'description' => 'compare different prices of your products to determine which performs better, with the goal of boosting conversions.',
            'route_name' => 'create-split-test',
            'image' => 'split-test.png'
        ],
        'rules' => [
            'name' => 'rules',
            'description' => 'Rules help guide actions toward desired results',
            'route_name' => 'create-split-test',
            'image' => 'rules.png'
        ],
        'ai' => [
            'name' => 'A.I',
            'description' => 'With our Artificial intelligence you can create, optimize, and manage your prices.',
            'route_name' => 'create-split-test',
            'image' => 'ai.png'
        ]

    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.create-experiment');
    }
}
