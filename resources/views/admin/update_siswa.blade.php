@extends('layout.index')
@section('title','Update Siswa')
@section('content1')
    <h3 class="mb-4" style="display:inline-block">Update Siswa</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Update Siswa</li>
    </ol>

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postUpdateSiswa')}}" method="POST">
                        <b>Siswa</b>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                        <input type="text" name="nisn" class="form-control" required value="{{$data->nisn}}">
                        </div>

                        <div class="form-group">
                             <label for="nama">Kelas</label>
                             <select class="form-control" name="kelas">
                                 @foreach($kelas as $kel)
                                    <option value="{{$kel->id}}" @if ($data->kelas == $kel->id) {{'selected'}} @endif>{{$kel->nama_kelas}}</option>
                                 @endforeach
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="email" name="email" class="form-control" required value="{{$data->email}}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" required value="{{$data->}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control">{{$data->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-5">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="islam" @if ($data->agama == 'islam') {{'selected'}} @endif >Islam</option>
                                        <option value="khatolik" @if ($data->agama == 'khatolik') {{'selected'}} @endif>Katholik</option>
                                        <option value="protestan" @if ($data->agama == 'protestan') {{'selected'}} @endif>Protestan</option>
                                        <option value="konghucu" @if ($data->agama == 'konghucu') {{'selected'}} @endif>Konghucu</option>
                                        <option value="budha" @if ($data->agama == 'budha') {{'selected'}} @endif>Budha</option>
                                        <option value="hindu" @if ($data->agama == 'hindu') {{'selected'}} @endif>Hindu</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L" @if ($data->jenis_kelamin == 'L') {{'selected'}} @endif>Pria</option>
                                        <option value="P" @if ($data->jenis_kelamin == 'P') {{'selected'}} @endif>Perempuan</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <b>Orang Tua</b>
                        <div class="form-group">
                            <label for="ayah">Nama Ayah</label>
                            <input type="text" name="ayah" class="form-control" required value="{{$data->nama_ayah}}">
                        </div>
                       

                        <div class="form-group">
                            <label for="ayah">Nama Ibu</label>
                            <input type="text" name="ibu" class="form-control" required value="{{$data->nama_ibu}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="nomor_ortu">Nomor Telpon Orang Tua</label>
                            <input type="number" name="nomor_ortu" class="form-control" required value="{{$data->nmr_ortu}}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button>
                            <a href="{{url('/dataSiswa')}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection