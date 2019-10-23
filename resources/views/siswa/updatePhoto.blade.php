@extends('layout.index')
@section('title','Update Photo ')
@section('content1')
	
	
    <div class='row'>
        @if($siswa->profile != null)
            <div class='col-md-6'>
                <div class="card">
                    <div class="card-header">
                        <h3>Photo Profile</h3>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        @endif
        <div class='col-md-6'>
            <div class="card">
                <div class="card-header">
                    <h3>Update Photo Profile</h3>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{url('/siswa/postUpdatePhoto')}}">
                         @if (count($errors)>0)
                            <div class="alert alert danger">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger"><b>{{$error}}</b></p>                             
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <b>File Gambar</b><br/>
                            <input type="file" name="file">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
