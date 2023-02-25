<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_project extends Model
{
    use HasFactory , HasSlug;

    protected $guarded = ['id'];

    public function gallery_project(){
        return $this->hasMany(gallery_project::class,'category_project_id','id');
    }
    public function slugConfigs(): array
    {
        return [
            'slug' => 'category_project',
            
        ];
    }
}
