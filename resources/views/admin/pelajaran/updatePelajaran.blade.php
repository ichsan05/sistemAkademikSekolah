@extends('layout.index')
@section('title','Update Pelajaran')
@section('content1')
    <h3 class="mb-4" style="display:inline-block">Update Pelajaran</h3>

    <ol class='breadcrumb'>
        <li class='breadcrumb-item'>Dashboard</li>
        <li class='breadcrumb-item active'>Update Pelajaran</li>
    </ol>

    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                    <form action="{{url('/postUpdatePelajaran')}}" method="POST">
                        @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                                    
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="nip">Kode Pelajaran</label>
                            <input type="text" name="kode" class="form-control" required value="{{$data->kode_pelajaran}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pelajaran</label>
                            <input type="text" name="nama" class="form-control" required value="{{$data->nama_pelajaran}}">
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