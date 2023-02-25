<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\comment_project;
use App\Models\gallery_project;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $banner = banner::orderBy('created_at','DESC')->limit(2)->get();

        $project = gallery_project::inRandomOrder()->limit(8)->get();
        $nav = gallery_project::all();
        
        return view('landing.main',compact(
            'banner',
            'project',
            'nav',
        ));
    }

    public function project_detail($slug){
        $data = gallery_project::where('slug',$slug)->with('comment_project')->first();
        $comment = gallery_project::with('comment_project')->get();
        // dd($comment);

        $nav = gallery_project::all();
        return view('landing.project-detail',compact(
            'data',
            'nav',
            'comment',
        ));
    }

    public function insert_comment_project_detail(Request $request,$slug ){
        $dataa = gallery_project::where('slug',$slug)->firstOrFail();
        
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'project_id' => 'required',
            'comment' => 'required',
        ]);
        $data = comment_project::create($request->all());

        $data->save();
        return redirect()->route('project_detail',$dataa->slug)->with('success', 'Data Berhasil Ditambakan');
    }

    public function project(){
        $data = gallery_project::orderBy('created_at','DESC')->with('comment_project')->get();

        $nav = gallery_project::all();
        return view('landing.project',compact(
            'data',
            'nav',
        ));
    }
}
