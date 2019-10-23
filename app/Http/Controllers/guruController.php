<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guru;
class guruController extends Controller
{
    public function index()
    {   
        $guru = guru::paginate(8);
        return view('admin/guru/index',['guru'=>$guru]);
    }
    public function addGuru()
    {
        return view('admin/guru/addGuru');
    }
    public function postGuru(Request $request)
    {
        $insert = guru::insert([
            'nip' => $request->nip,
            'nama'=> $request->nama,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tempat_lahir'=>$request->tmpt_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'telpon'=>$request->telpon,
        ]);
        
        if ($insert) {
            return redirect('/dataGuru');
        }
        else{
            return back()->with('error','Gagal Menambah Guru');
        }
    }

    public function updateGuru($id)
    {
        $guru = guru::find($id);

        return view('admin/guru/updateGuru',['data'=> $guru]);
    }

    public function postUpdateGuru(Request $request)
    {
        $update = guru::where(['nip'=>$request->nip])->update([
            'nip' => $request->nip,
            'nama'=> $request->nama,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'tempat_lahir'=>$request->tmpt_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'telpon'=>$request->telpon,
        ]);
        return redirect('/dataGuru');
    }
    public function deleteGuru($id)
    {
        guru::where(['id'=>$id])->delete();
        return redirect('/dataGuru');
    }
}
