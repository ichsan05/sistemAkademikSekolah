<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\nilai;
use DB;
use Auth;
use PDF;

use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class siswaController extends Controller
{
    public function index()
    {
        $data = siswa::all();
        return view('admin/data_siswa',['data'=>$data]);
    }
    public function addSiswa()
    {
        $kelas = DB::table('kelas')->get();
        return view('admin/add_siswa',['kelas'=>$kelas]);
    }
    public function addSiswaExcel()
    {
        return view('admin/add_siswa_excel');
    }

    public function postSiswaExcel(Request $request)
    {
        siswa::insert([
            "nisn" => "9789",
            "nama" => "Udin",
            "alamat" => "Medan",
            "agama" => "Islam",
            "jenis_kelamin" => "L",
            "anak_ke" => 3.0,
            "jumlah_sdr" => 3.0,
            "nama_ayah" => "Kalai",
            "tmpt_lhr_ayah" => "Medan ",
            "tgl_lhr_ayah" => 37048.0,
            "nama_ibu" => "Yuyun",
            "tmpt_lhr_ibu" => "Medan",
            "tgl_lahir_ibu" => 37048.0,
            "nmr_ortu" => 99678.0,
        ]);
        
        // $this->validate($request,[
        //     'file' => 'required|mimes:xls,xlsx',
        // ]);
        
        // // menangkap file excel
		// $file = $request->file('file');
 
		// // membuat nama file unik
		// $nama_file = rand().$file->getClientOriginalName();
        
		// // upload ke folder file_siswa di dalam folder public
		// $file->move('file_siswa',$nama_file);
 
		// // import data
		// Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// // notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// // alihkan halaman kembali
		return redirect('/dataSiswa');

    }

    public function postSiswa(Request $request)
    {
        $this->validate($request,[
            "nisn" => 'unique:siswa,nisn',
        ]);

       $user  = new \App\User;
       $user->role = 'siswa';
       $user->name = $request->nama;
       $user->email = $request->email;
       $user->password = bcrypt('rahasia');
       $user->remember_token = str_random(30);
       $user->save();

       siswa::insert([
        "user_id" => $user->id,
        "nisn" => $request->nisn,
        "nama" => $request->nama,
        "kelas"=>$request->kelas,
        "email" => $request->email,
        "alamat" => $request->alamat,
        "agama" => $request->agama,
        "jenis_kelamin" => $request->jenis_kelamin,
        "nama_ayah" => $request->ayah,
        "nama_ibu" => $request->ibu,
        "nmr_ortu" => $request->nomor_ortu,
       ]);


       return redirect('/dataSiswa');
    }
    public function deleteSiswa($id)
    {
        $siswa = siswa::where(['id' => $id]);
        $siswa->delete();

        return redirect('/dataSiswa');
    }
    public function updateSiswa($id)
    {
        $siswa = siswa::find($id);
        
        if(!$siswa){
            abort(404);
        }
        
        $kelas = DB::table('kelas')->get();
        return view('/admin/update_siswa',['data'=>$siswa,'kelas'=>$kelas]);
    }
    public function postUpdateSiswa(Request $request)
    {
        siswa::where('nisn',$request->nisn)->update([
            "nisn" => $request->nisn,
            "nama" => $request->nama,
            "kelas" => $request->kelas,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "jenis_kelamin" => $request->jenis_kelamin,         
            "nama_ayah" => $request->ayah,
            "nama_ibu" => $request->ibu,       
            "nmr_ortu" => $request->nomor_ortu,
        ]);
        return redirect('/dataSiswa');
    }

    public function profile()
    {
        $select = siswa::join('kelas','kelas.id','=','siswa.kelas')
                        ->select('siswa.*','kelas.nama_kelas')
                        ->where(['user_id' => auth()->user()->id])
                        ->first();
        return view('siswa/profile',['data'=>$select]);
    }

    public function updateProfile($id)
    {

        $data = siswa::find($id);
        $kelas = DB::table('kelas')->get();
        return view('siswa/updateProfile',['data'=> $data,'kelas'=>$kelas]);
    }
    public function postUpdateProfile(Request $request)
    {
        siswa::where(['nisn'=>$request->nisn])->update([
            "nisn" => $request->nisn,
            "nama" => $request->nama,
            "kelas" => $request->kelas,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "agama" => $request->agama,
            "jenis_kelamin" => $request->jenis_kelamin,         
            "nama_ayah" => $request->ayah,
            "nama_ibu" => $request->ibu,       
            "nmr_ortu" => $request->nomor_ortu,
        ]);
        return redirect('/profile')->with('success','Update Data berhasil');
    }

    public function nilai()
    {
        $id = Auth::id();
        $nilai = nilai::join('pelajaran','pelajaran.id','=','nilai.id_pelajaran')
                    ->select('nilai.*','pelajaran.nama_pelajaran')
                    ->where(['id_siswa'=>$id])
                    ->orderBy('nilai.semester','ASC')
                    ->get();
        return view('siswa/nilai',['data'=>$nilai]);
    }
    public function printNilai()
    {
        $id = Auth::id();
        $pegawai = nilai::join('pelajaran','pelajaran.id','=','nilai.id_pelajaran')
                    ->select('nilai.*','pelajaran.nama_pelajaran')
                    ->where(['id_siswa'=>$id])
                    ->orderBy('nilai.semester','ASC')
                    ->get();
 
        $pdf = PDF::loadview('siswa/nilai_pdf',['data'=>$pegawai]);
        return $pdf->stream();
    }

    public function updatePhoto()
    {
        $id = Auth::user()->id;
        $siswa = siswa::find($id);
        return view('siswa/updatePhoto',['siswa'=>$siswa]);        
    }

    public function postUpdatePhoto(Request $request)
    {
        $this->validate($request, [
        'file' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
     
            // nama file
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
     
            // ekstensi file
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
     
            // real path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
     
            // ukuran file
        echo 'File Size: '.$file->getSize();
        echo '<br>';
     
            // tipe mime
        echo 'File Mime Type: '.$file->getMimeType();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'photo';
        $file->move($tujuan_upload,$file->getClientOriginalName());

        
    }
}
