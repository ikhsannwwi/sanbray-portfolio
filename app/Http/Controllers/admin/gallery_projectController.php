<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category_project;
use App\Models\gallery_project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class gallery_projectController extends Controller
{
    public function add_gallery_project()
    {
        $data = gallery_project::all();
        $data_category_project = category_project::all();

        return view('admin.add.add-gallery-project',compact('data','data_category_project'));
    }
    public function insert_gallery_project(Request $request){
        $request->validate([
            'nama_project' => 'required',
            'deskripsi' => 'required',
            'url' => 'required',
            'foto' => 'required',
            'category_project_id' => 'required',
        ]);
        $data = gallery_project::create($request->all());

        if ($request->hasFile('foto')) {
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/gallery-project', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('gallery_project')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_gallery_project($id)
    {
        $data = gallery_project::find($id);

        $data_category_project = category_project::all();

        return view('admin.edit.edit-gallery-project' ,compact('data','data_category_project'));
    }

    public function update_gallery_project(Request $request, $id){
        $data = gallery_project::find($id);
        if ($request->hasFile('foto')) {
            # code...
            if (File_exists(public_path('images/gallery-project/' . $data->foto))) { //either you can use file path instead of $data->image
                unlink(public_path('images/gallery-project/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
        }
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/gallery-project', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('gallery_project')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete_gallery_project($id){
        $data = gallery_project::find($id);

        if (File_exists(public_path('images/gallery-project/' . $data->foto))) { //either you can use file path instead of $data->image
            unlink(public_path('images/gallery-project/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
        }
        
        $data->delete();
        return redirect()->route('gallery_project')->with('error', 'Data Berhasil Dihapus');
    }
}
