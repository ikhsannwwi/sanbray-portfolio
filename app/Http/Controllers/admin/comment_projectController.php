<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\comment_project;
use App\Models\gallery_project;
use Illuminate\Http\Request;

class comment_projectController extends Controller
{
    public function add_comment_project(){
        $data = comment_project::all();

        $data_gallery_project = gallery_project::all();

        return view('admin.add.add-comment-project' , compact('data','data_gallery_project'));
    }

    public function insert_comment_project(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'project_id' => 'required',
            'comment' => 'required',
        ]);
        $data = comment_project::create($request->all());

        $data->save();
        return redirect()->route('comment_project')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_comment_project($id){
        $data = comment_project::find($id);

        $data_gallery_project = gallery_project::all();

        return view('admin.edit.edit-comment-project',compact(
            'data',
            'data_gallery_project',
        ));
    }

    public function update_comment_project(Request $request,$id){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'project_id' => 'required',
            'comment' => 'required',
        ]);

        $data = comment_project::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('comment_project')->with('success','Data Berhasil Diupdate');
    }

    public function delete_comment_project($id){
        $data = comment_project::find($id);

        $data->delete();

        return redirect()->route('comment_project')->with('error','Data Berhasil Dihapus');
    }
}
