<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery_project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category_project(){
        return $this->belongsTo(category_project::class,'category_project_id','id');
    }
}
