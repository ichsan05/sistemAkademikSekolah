<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;
class kelasController extends Controller
{
    public function index()
    {
    	$kelas = kelas::all();
    	return view('admin.kelas.index',['data'=>$kelas]);
    }
    public function addKelas()
    {
    	return view('admin.kelas.add_kelas');
    }
    public function postKelas(Request $request)
    {
    	kelas::insert([

    		'kode_kelas'=>$request->kode,
    		'nama_kelas'=>$request->nama,
    	]);
    	return redirect('/kelas');
    }

    public function updateKelas($id)
    {
    	$kelas = kelas::find($id);
    	return view('/admin/kelas/update_kelas',['data'=>$kelas]);
    }


    public function postUpdateKelas(Request $request)
    {
    	kelas::where(['id'=>$request->id])->update([
    		'kode_kelas'=>$request->kode,
    		'nama_kelas'=>$request->nama,
    	]);
    	return redirect('kelas');

    }

    public function deleteKelas($id)
    {
    	$kelas = kelas::where(['id'=>$id])->delete();
    	return redirect('/kelas');
    }
}
