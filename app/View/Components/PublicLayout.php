<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PublicLayout extends Component
{
    public string $title;
    public string $description;

    public function __construct(string $title = 'Demo blog', string $description = '')
    {
        $this->title = $title;
        $this->description = $description;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.public');
    }
}
