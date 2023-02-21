<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category_project;
use Illuminate\Http\Request;

class category_projectController extends Controller
{
    public function add_category_project(){
        $data = category_project::all();

        return view('admin.add.add-category-project' , compact('data'));
    }

    public function insert_category_project(Request $request){
        $request->validate([
            'category_project' => 'required',
        ]);
        $data = category_project::create($request->all());

        $data->save();
        return redirect()->route('category_project')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_category_project($id){
        $data = category_project::find($id);

        return view('admin.edit.edit-category-project',compact('data'));
    }

    public function update_category_project(Request $request,$id){
        $request->validate([
            'category_project' => 'required'
        ]);

        $data = category_project::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('category_project')->with('success','Data Berhasil Diupdate');
    }

    public function delete_category_project($id){
        $data = category_project::find($id);

        $data->delete();

        return redirect()->route('category_project')->with('error','Data Berhasil Dihapus');
    }
}
