<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string           $title = null,
        public ?string           $description = null,
        public array|string|null $keywords = null,
    )
    {
        $this->explodeKeywords($this->keywords);
    }

    protected function explodeKeywords($keywords): array
    {
        if (is_string($keywords)) {
            return array_map('trim', explode(',', $keywords));
        }

        if (is_array($keywords)) {
            return array_map('trim', $keywords);
        }

        return [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}
