<?php

namespace Michaelmano\Laramin;

use App\Http\Controllers\Controller;

class LaraminController extends Controller
{
    public function index()
    {
        return view('laramin::index');
    }

    public function contact()
    {
        \Mail::raw(request('message'), function ($message) {
            $message->from(auth()->user()->email, auth()->user()->name);
            $message->to(\Config::get('laramin.project_manager.email'));
        });

        return response()->json([
            'message' => \Config::get('laramin.project_manager.contact_finalised_message'),
        ]);
    }
}
