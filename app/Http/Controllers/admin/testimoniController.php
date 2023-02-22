<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class testimoniController extends Controller
{
    public function add_testimoni()
    {
        $data = testimoni::all();

        return view('admin.add.add-testimoni',compact('data'));
    }
    public function insert_testimoni(Request $request){
        $request->validate([
            'nama_client' => 'required',
            'message' => 'required',
            'foto' => 'required',
        ]);
        $data = testimoni::create($request->all());

        if ($request->hasFile('foto')) {
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/testimoni', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('testimoni')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_testimoni($id)
    {
        $data = testimoni::find($id);
        
        return view('admin.edit.edit-testimoni' ,compact('data'));
    }

    public function update_testimoni(Request $request, $id){
        $data = testimoni::find($id);
        if ($request->hasFile('foto')) {
            # code...
            if (File_exists(public_path('images/testimoni/' . $data->foto))) { //either you can use file path instead of $data->image
                unlink(public_path('images/testimoni/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
        }
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $filename = Str::random(8). '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/testimoni', $filename);
            $data->foto = $filename;
            $data->save();
        }

        return redirect()->route('testimoni')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete_testimoni($id){
        $data = testimoni::find($id);

        if (File_exists(public_path('images/testimoni/' . $data->foto))) { //either you can use file path instead of $data->image
            unlink(public_path('images/testimoni/' . $data->foto)); //here you can also use path like as ('uploads/media/welcome/'. $data->image)
        }
        
        $data->delete();
        return redirect()->route('testimoni')->with('error', 'Data Berhasil Dihapus');
    }
}
