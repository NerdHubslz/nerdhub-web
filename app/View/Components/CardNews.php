<?php

namespace App\View\Components;

use App\Models\News;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardNews extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public News $news,
        public bool $featured = false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nerdhub.card-news');
    }
}
