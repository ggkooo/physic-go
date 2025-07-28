<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('activeClass')) {
    function activeClass($path)
    {
        return Request::is($path) ? 'active text-white bg-danger' : 'text-white';
    }
}
