<?php

if (!function_exists('get_post_all')) {
    function get_post_all()
    {
        return \Mallcode\Post\Models\Post::all();
    }
}
