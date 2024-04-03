<?php

namespace Mallcode\Post\View\Components;

use Illuminate\View\Component;
use Mallcode\Post\Models\Post;

class AlertComponent extends Component
{
    public $title;
    public $email;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $email)
    {
        $this->title = $title;
        $this->email = $email;
    }

    public function getUsers()
    {
        return Post::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = $this->getUsers();
        return view('post::components.alertComponent', compact('users'));
    }
}
