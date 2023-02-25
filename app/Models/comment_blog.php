<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blog(){
        return $this->belongsTo(blog::class , 'blog_id','id');
    }
}
