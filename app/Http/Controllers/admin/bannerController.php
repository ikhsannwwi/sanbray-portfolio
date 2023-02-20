<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class bannerController extends Controller
{
    public function cvDownload(){
        return response()->download(public_path('toastr/demo.html'));

        return redirect('index')->with('success','File CV telah didownload');
    }

    public function add_banner()
    {
        $data = banner::all();

        return view('admin.add.add-banner',compact('data'));
    }
    public function insert_banner(Request $request){
        $request->validate([
            'title_banner' => 'required',
            'body_banner' => 'required',
            'foto' => 'required',
        ]);
        $data = banner::create($request->all());

        if ($request->hasFile('foto')) {
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/banner', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('banner')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_banner($id)
    {
        $data = banner::find($id);

        return view('admin.edit.edit-banner' ,compact('data'));
    }

    public function update_banner(Request $request, $id){
        $data = banner::find($id);
        if ($request->hasFile('foto')) {
            # code...
            if (File_exists(public_path('images/banner/' . $data->foto))) { //either you can use file path instead of $data->image
                unlink(public_path('images/banner/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
        }
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            if (File_exists(public_path('images/banner/' . $data->foto))) { //either you can use file path instead of $data->image
                unlink(public_path('images/banner/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/banner', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('banner')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete_banner($id){
        $data = banner::find($id);

        if (File_exists(public_path('images/banner/' . $data->foto))) { //either you can use file path instead of $data->image
            unlink(public_path('images/banner/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
        }
        
        $data->delete();
        return redirect()->route('banner')->with('error', 'Data Berhasil Dihapus');
    }
}
