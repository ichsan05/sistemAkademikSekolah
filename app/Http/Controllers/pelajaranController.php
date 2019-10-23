<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelajaran;

class pelajaranController extends Controller
{
    public function index()
    {	
    	$data = pelajaran::all();
    	return view('admin/pelajaran/index',['data'=>$data]);
    }
    public function updatePelajaran($id)
    {
    	$data = pelajaran::find($id);
    	return view('admin/pelajaran/updatePelajaran',['data'=>$data]);
    }
    public function postUpdatePelajaran(Request $request)
    {
    	pelajaran::where(['id'=>$request->id])->update([
    		'kode_pelajaran'=>$request->kode,
    		'nama_pelajaran'=>$request->nama,
    	]);

    	return redirect('/pelajaran');
    }
    public function deletePelajaran($id)
    {
    	pelajaran::where(['id'=>$id])->delete();
    	return redirect('/pelajaran');
    }
    public function addPelajaran()
    {
        return view('admin/pelajaran/addPelajaran');
    }
    public function postPelajaran(Request $request)
    {
        pelajaran::insert([
            'kode_pelajaran'=>$request->kode,
            'nama_pelajaran'=>$request->nama,
        ]);
        return redirect('/pelajaran');
    }
}
