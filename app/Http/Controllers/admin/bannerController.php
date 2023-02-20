<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\banner;
use Illuminate\Http\Request;

class bannerController extends Controller
{
    public function cvDownload(){
        return response()->download(public_path('toastr/demo.html'));

        return redirect('index')->with('success','File CV telah didownload');
    }

    public function fe_add_banner()
    {
        $data = banner::all();

        return view('fe.add.add-harga-jual',compact('data'));
    }
    public function fe_insert_banner(Request $request){
        $request->validate([
            'banner' => 'required',
            'rp' => 'required',
        ]);
        $data = banner::create($request->all());

        $data->save();
        return redirect()->route('banner')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function fe_edit_banner($id)
    {
        $data = banner::find($id);

        return view('fe.edit.edit-harga-jual' ,compact('data'));
    }

    public function fe_update_banner(Request $request, $id){
        $data = banner::find($id);

        $data->update($request->all());

        $data->save();
        return redirect()->route('banner')->with('success', 'Data Berhasil Diupdate');
    }

    public function fe_delete_banner($id){
        $data = banner::find($id);
        
        $data->delete();
        return redirect()->route('banner')->with('error', 'Data Berhasil Dihapus');
    }
}
