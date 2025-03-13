<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    // Show all music tracks
    public function index() {
        $music = Music::latest()->get();
        return view('music.index', compact('music'));
    }

    // Show the form to share a new track
    public function create() {
        return view('music.create');
    }

    // Store a new music track
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp3,wav,ogg|max:10240', // Limit to 10MB
        ]);
    
        $path = $request->file('file')->store('music', 'public'); // Saves to storage/app/public/music
    
        Music::create([
            'title' => $request->title,
            'file_path' => $path,
            'artist' => $request->artist ?? 'Unknown Artist', // Set default value
            'user_id' => Auth::user()->id,
        ]);

        if (Auth::check()) {
            $userId = Auth::user()->id;
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to upload music.');
        }
        
        return redirect()->back()->with('success', 'Music uploaded successfully!');
    }
    // Show a single music track
    public function show(Music $music) {
        return view('music.show', compact('music'));
    }

    // Like a music track
    public function like(Music $music) {
        $music->likes()->attach(Auth::id());
        return back();
    }

    // Comment on a music track
    public function comment(Request $request, Music $music) {
        $request->validate([
            'comment' => 'required',
        ]);

        $music->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->comment,
        ]);

        return back();
    }
}
