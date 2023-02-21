<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_blog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blog(){
        return $this->hasMany(blog::class,'category_blog_id','id');
    }
}
