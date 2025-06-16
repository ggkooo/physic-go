<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigAccountController extends Controller
{
    public function index()
    {
        return view('admin.index', ['page' => 'config.config-account']);
    }
}
