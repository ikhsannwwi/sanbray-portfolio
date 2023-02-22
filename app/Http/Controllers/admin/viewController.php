<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\blog;
use App\Models\category_blog;
use App\Models\category_project;
use App\Models\gallery_project;
use App\Models\testimoni;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function administrator(){
        return view('admin.data.dashboard');
    }
    public function banner(){
        $data = banner::orderBy('created_at','DESC')->get();

        return view('admin.data.banner', compact('data'));
    }
    public function blog(){
        $data = blog::orderBy('tanggal','DESC')->get();
        
        return view('admin.data.blog' , compact('data'));
    }
    public function category_blog(){
        $data = category_blog::orderBy('id','ASC')->get();

        return view('admin.data.category-blog',compact('data'));
    }
    public function gallery_project(){
        $data = gallery_project::orderBy('created_at','DESC')->get();

        return view('admin.data.gallery-project',compact('data'));
    }
    public function category_project(){
        $data = category_project::orderBy('id','ASC')->get();

        return view('admin.data.category-project',compact('data'));
    }
    public function testimoni(){
        $data = testimoni::orderBy('created_at', 'DESC')->get();

        return view('admin.data.testimoni',compact('data'));
    }
}
