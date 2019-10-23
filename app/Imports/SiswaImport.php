<?php

namespace App\Imports;

use App\siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new siswa([
            'nisn' => $row[0],
            'nama' => $row[1],
            'alamat' => $row[2],
            'agama'=> $row[3],
            'jenis_kelamin'=> $row[4],
            'anak_ke'=> $row[5],
            'jumlah_sdr'=> $row[6],
            'nama_ayah'=> $row[7],
            'tmpt_lhr_ayah'=> $row[8],
            'tgl_lhr_ayah'=> $row[9],
            'nama_ibu'=> $row[10],
            'tmpt_lhr_ibu'=> $row[11],
            'tgl_lahir_ibu'=> $row[12],
            'nmr_ortu'=> $row[13],
        ]);
    }
}
