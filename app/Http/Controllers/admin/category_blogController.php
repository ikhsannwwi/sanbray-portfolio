<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category_blog;
use Illuminate\Http\Request;

class category_blogController extends Controller
{
    public function add_category_blog(){
        $data = category_blog::all();

        return view('admin.add.add-category-blog' , compact('data'));
    }

    public function insert_category_blog(Request $request){
        $request->validate([
            'category_blog' => 'required',
        ]);
        $data = category_blog::create($request->all());

        $data->save();
        return redirect()->route('category_blog')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_category_blog($id){
        $data = category_blog::find($id);

        return view('admin.edit.edit-category-blog',compact('data'));
    }

    public function update_category_blog(Request $request,$id){
        $request->validate([
            'category_blog' => 'required'
        ]);

        $data = category_blog::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('category_blog')->with('success','Data Berhasil Diupdate');
    }

    public function delete_category_blog($id){
        $data = category_blog::find($id);

        $data->delete();

        return redirect()->route('category_blog')->with('error','Data Berhasil Dihapus');
    }
}
