<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\nilai;

class nilaiController extends Controller
{
    public function index()
    {	
    	$kelas = DB::table('kelas')->get();
    	return view('admin.nilai.index',['kelas'=>$kelas]);
    }
    public function resKelas($id)
    {
    	$kelas = DB::table('kelas')->find($id);
    	$siswa = DB::table('siswa')
                    ->select('siswa.*','kelas.nama_kelas')
                    ->join('kelas','kelas.id','=','siswa.kelas')
                    ->where(['kelas'=>$id])
                    ->get();

        return view('admin.nilai.resKelas',['kelas'=>$kelas,'siswa'=>$siswa]);
    }
    public function tambahNilai($id)
    {
        return view('admin.nilai.addNilai',['id'=>$id]);
    }

    public function lihatNilai($id)
    {   
        $nilai = nilai::join('pelajaran','pelajaran.id','=','nilai.id_pelajaran')
                    ->select('nilai.*','pelajaran.nama_pelajaran')
                    ->where(['id_siswa'=>$id])
                    ->orderBy('nilai.semester','=','ASC')
                    ->get();
        $breadKelas = DB::table('siswa')->find($id); 
        // dd($breadKelas->kelas);
        return view('admin.nilai.lihatNilai',['nilai'=>$nilai,'idSiswa'=>$id,'breadKelas'=>$breadKelas]);
    }
    
    public function postNilai(Request $request)
    {
        $checkIsi = nilai::where([
            'id_pelajaran'=>$request->pelajaran,
            'semester'=>$request->semester,
            'id_siswa'=>$request->id,
        ])->get();
        
        if (count($checkIsi) == 0) {
            nilai::insert([
                'id_siswa'=> $request->id,
                'id_pelajaran' =>$request->pelajaran,
                'semester'=> $request->semester,
                'nilai'=>$request->nilai,
            ]);
            return redirect("/nilai/lihatNilai/$request->id")->with('success');
        }
        else{
            return redirect()->back()->with('error','* Nilai sudah ada silahkan edit nilai');
        }
    }
    public function editNilai($id)
    {
        $data = nilai::find($id);
        // dd($data->id_pelajaran);
        return view('/admin/nilai/editNilai',['nilai'=>$data]);
    }
    public function postUpdateNilai(Request $request)
    {
        nilai::where(['id'=>$request->id])->update([
            'id_pelajaran'=>$request->pelajaran,
            // 'semester'=>$request->semester,
            'nilai'=>$request->nilai,
        ]);
        return redirect("/nilai/lihatNilai/$request->id_siswa")->with('success');
    }
}
