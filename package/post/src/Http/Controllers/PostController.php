<?php

namespace Mallcode\Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Mallcode\Post\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        return view("post::index", compact('data'));
    }

    public function createShow()
    {
        return view("post::postCreate");
    }
}
