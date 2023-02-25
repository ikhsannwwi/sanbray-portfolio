<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project(){
        return $this->belongsTo(gallery_project::class , 'project_id','id');
    }
}
