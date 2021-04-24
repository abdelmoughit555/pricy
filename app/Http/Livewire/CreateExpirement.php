<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateExpirement extends Component
{
    public $expirements = [
        'split_test' => [
            'name' => 'split test',
            'description' => 'compare different prices of your products to determine which performs better, with the goal of boosting conversions.',
            'route_name' => 'create-split-test',
            'image' => 'split-test.png'
        ],
        /*         'rules' => [
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
        ] */

    ];

    public function render()
    {
        return view('livewire.create-expirement');
    }
}
