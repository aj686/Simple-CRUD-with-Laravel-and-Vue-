<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class Storycontroller extends Controller
{
    //show all stories
    public function index()
    {
        $stories = Story::where('user_id', Auth::user()->id)->latest()->get();

        return Inertia::render('Dashboard', [
            'stories' => $stories,
            'count' => $stories->count(),
        ]);
    }

    public function store(){}

    public function update(){}

    public function destroy(){}
}
