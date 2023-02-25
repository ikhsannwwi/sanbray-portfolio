<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class gallery_project extends Model
{
    use HasFactory,HasSlug;

    protected $guarded = ['id'];

    public function comment_project(){
        return $this->hasMany(comment_project::class,'project_id');
    }
    public function category_project(){
        return $this->belongsTo(category_project::class,'category_project_id','id');
    }
    public function slugConfigs(): array
    {
        return [
            'slug' => 'nama_project',
        ];
    }
}
