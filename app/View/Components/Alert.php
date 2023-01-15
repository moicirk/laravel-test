<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Render an alert component from Components (bootstrap)
 */
class Alert extends Component
{
    /**
     * @var string
     */
    public string $type;

    public function __construct(string $type = 'info')
    {
        $this->type = $type;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.alert');
    }
}
