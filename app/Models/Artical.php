<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Comment;

class Artical extends Model
{
    use HasFactory;

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }
}