<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gallery_project(){
        return $this->hasMany(gallery_project::class,'category_project_id','id');
    }
}
