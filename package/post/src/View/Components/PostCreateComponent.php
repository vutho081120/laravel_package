<?php

namespace Mallcode\Post\View\Components;

use Illuminate\View\Component;
use Mallcode\Post\Models\Post;

class PostCreateComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('post::components.postCreateComponent');
    }
}
