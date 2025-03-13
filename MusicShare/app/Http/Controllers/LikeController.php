<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Music $music)
    {
        if ($music->likes()->where('user_id', Auth::id())->exists()) {
            $music->likes()->detach(Auth::id());
        } else {
            $music->likes()->attach(Auth::id());
        }

        return back();
    }
}

