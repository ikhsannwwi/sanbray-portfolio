<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\gallery_project;
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
        return view('admin.data.blog');
    }
    public function gallery_project(){
        $data = gallery_project::orderBy('created_at','DESC')->get();
        return view('admin.data.gallery-project',compact('data'));
    }
    public function testimoni(){
        return view('admin.data.testimoni');
    }
}
