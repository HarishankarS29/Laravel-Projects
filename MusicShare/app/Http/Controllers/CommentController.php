<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, Music $music)
    {
        $request->validate(['comment' => 'required|string']);

        $music->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->comment,
        ]);

        return back();
    }
}


