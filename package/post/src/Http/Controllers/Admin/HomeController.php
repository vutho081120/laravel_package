<?php

namespace Mallcode\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('post::Admin.Pages.Home');
    }
}
