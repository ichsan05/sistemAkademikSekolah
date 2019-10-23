@extends('layout.index')
@section('title','Tambah Pelajaran')
@section('content1')
    <h3 class="mb-4" style="display:inline-block">Tambah Pelajaran</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Tambah Pelajaran</li>
    </ol>

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postPelajaran')}}" method="POST">
                        @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                                
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="kode_kelas">Kode Pelajaran</label>
                            <input type="text" name="kode" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pelajaran</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>    

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <a href="{{url('/pelajaran')}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection