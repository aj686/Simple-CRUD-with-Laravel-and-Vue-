<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //show all stories
    public function index()
    {
        $stories = Story::where('user_id', Auth::user()->id)->latest()->get();

        return Inertia::render('NewDashboard', [
            'stories' => $stories,
            'count' => $stories->count(),
        ]);
    }


    public function store(){}

    public function update(){}

    public function destroy(){}

    // show all stories at first page - for all users
    public function showAllStories()
    {
        $stories = Story::latest()->get();

        return Inertia::render('Homepage', [
            'stories' => $stories,
        ]);
    }
}
