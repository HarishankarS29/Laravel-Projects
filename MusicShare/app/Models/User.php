<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable {
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

    public function music()
    {
        return $this->hasMany(Music::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Music::class, 'likes')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}