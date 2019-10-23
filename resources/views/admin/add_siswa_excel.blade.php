@extends('layout.index')
@section('title','Tambah Siswa')
@section('content1')
    {{-- <h3 class="mb-4" style="display:inline-block">Tambah Siswa</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Tambah Siswa</li>
    </ol> --}}

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postSiswaExcel')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                                    
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="file" name="file" class="form-control"><br>
                            <button class="btn btn-primary">Upload</button>
                            <a href="{{url('/dataSiswa')}}">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection