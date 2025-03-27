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


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Story::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
        ]);

        // return Inertia::render('NewDashboard')->with('message', 'Story created successfully');
        // return redirect()->route('newdashboard');
        return to_route('newdashboard')->with('success', 'Story created successfully!');
        
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $story->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return to_route('newdashboard')->with('success', 'Story updated successfully!');
    }

    public function destroy(Story $story){
        $story->delete();
        return to_route('newdashboard')->with('success', 'Story deleted successfully!');
    }
}
