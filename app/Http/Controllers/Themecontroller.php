<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Themecontroller extends Controller
{
    public function index()
    {
        return view('Theme.index');
    }
    public function category()
    {
        return view('Theme.category');
    }

    public function contact()
    {
        return view('Theme.contact');
    }

    public function blog()
    {
        return view('Theme.blog');
    }
    public function login()
    {
        return view('Theme.auth.login');
    }
    public function register()
    {
        return view('Theme.auth.register');
    }
}
