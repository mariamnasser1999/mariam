<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['email', 'name', 'subject', 'message', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo(blog::class);
    }
}
