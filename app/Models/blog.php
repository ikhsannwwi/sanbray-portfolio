<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory , HasSlug;

    protected $guarded = [];

    public function category_blog(){
        return $this->belongsTo(category_blog::class, 'category_blog_id','id');
    }
    
    public function slugConfigs(): array
    {
        return [
            'slug' => 'title_blog',
            
        ];
    }
}
