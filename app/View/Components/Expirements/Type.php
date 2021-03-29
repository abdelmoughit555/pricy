<?php

namespace App\View\Components\Expirements;

use Illuminate\View\Component;

class Type extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $expirement;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($expirement)
    {
        $this->expirement = $expirement;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.expirements..type');
    }
}
