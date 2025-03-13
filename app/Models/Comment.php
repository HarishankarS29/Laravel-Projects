<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'music_id', 'content'];

    // Define relationship with User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Define relationship with Music
    public function music() {
        return $this->belongsTo(Music::class);
    }
}
