<?php

namespace Michaelmano\Laramin;

use App\Http\Controllers\Controller;

class LaraminController extends Controller
{
    public function index()
    {
        return view('laramin::laramin.intro.index');
    }

    public function sprite()
    {
        return view('laramin::laramin.sprite.index');
    }
}
