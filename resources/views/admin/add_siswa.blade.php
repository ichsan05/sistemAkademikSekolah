@extends('layout.index')
@section('title','Tambah Siswa')
@section('content1')
    <h3 class="mb-4" style="display:inline-block">Tambah Siswa</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Tambah Siswa</li>
    </ol>

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postSiswa')}}" method="POST">
                        @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                                    
                                @endforeach
                            </div>
                        @endif
                        <b>Siswa</b>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" name="nisn" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                             <label for="nama">Kelas</label>
                             <select class="form-control" name="kelas">
                                 @foreach($kelas as $kel)
                                    <option value="{{$kel->id}}">{{$kel->nama_kelas}}</option>
                                 @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-5">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="islam">Islam</option>
                                        <option value="khatolik">Katholik</option>
                                        <option value="protestan">Protestan</option>
                                        <option value="konghucu">Konghucu</option>
                                        <option value="budha">Budha</option>
                                        <option value="hindu">Hindu</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L">Pria</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <b>Orang Tua</b>
                        <div class="form-group">
                            <label for="ayah">Nama Ayah</label>
                            <input type="text" name="ayah" class="form-control" required>
                        </div>
                        

                        <div class="form-group">
                            <label for="ayah">Nama Ibu</label>
                            <input type="text" name="ibu" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nomor_ortu">Nomor Telpon Orang Tua</label>
                            <input type="number" name="nomor_ortu" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <a href="{{url('/dataSiswa')}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection