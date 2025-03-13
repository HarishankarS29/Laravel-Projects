<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'artist', 'user_id'];


    // Define relationship with User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Define relationship for likes (many-to-many)
    public function likes() {
        return $this->belongsToMany(User::class, 'music_likes')->withTimestamps();
    }

    // Define relationship for comments (one-to-many)
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
