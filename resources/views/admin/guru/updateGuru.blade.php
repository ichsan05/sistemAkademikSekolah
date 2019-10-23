@extends('layout.index')
@section('title','Update Guru')
@section('content1')
    <h3 class="mb-4" style="display:inline-block">Update Guru</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Update Guru</li>
    </ol>

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postUpdateGuru')}}" method="POST">
                        @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                                    
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nip">Nip</label>
                            <input type="text" name="nip" class="form-control" required value="{{$data->nip}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required value="{{$data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="L">Pria</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input type="text" name="tmpt_lahir" class="form-control" required value="{{$data->tempat_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" required value="{{$data->tgl_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{$data->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">No Telpon</label>
                            <input type="number" name="telpon" class="form-control" required value="{{$data->telpon}}">
                        </div>
                       
                        
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <a href="{{url('/dataGuru')}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection