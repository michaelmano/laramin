<?php

namespace Michaelmano\Laramin;

use App\Http\Controllers\Controller;

class LaraminController extends Controller
{
    public function index()
    {
        return view('laramin::index');
    }

    public function login()
    {
        return view('laramin::login');
    }
}
