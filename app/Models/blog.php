<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category_blog(){
        return $this->belongsTo(category_blog::class, 'category_blog_id','id');
    }
}
