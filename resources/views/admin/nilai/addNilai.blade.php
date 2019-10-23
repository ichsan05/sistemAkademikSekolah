@extends('layout/index')
@section('title','Tambah Nilai')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Tambah Nilai</h3>
{{-- <a href="{{url('/addPelajaran')}}" style="float:right" class="btn btn-info btn-sm">Tambah Pelajaran</a> --}}

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item'><a href="{{url('/nilai')}}">Data Nilai</a></li>
    <li class='breadcrumb-item active'>Tambah Nilai</li>

</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
        	<div class="card-body">
        		<form action="{{url('/nilai/postNilai')}}" method="POST">
                    @if ($m = Session::get('error'))
                        <div class="alert alert danger">
                            <strong class="text-danger">{{$m}}</strong>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group">
                        <label for="nisn">Pelajaran</label>
                        <select class="form-control" name="pelajaran">
                        	@foreach(DB::table('pelajaran')->get() as $pel)
                        		<option value="{{$pel->id}}">{{$pel->nama_pelajaran}}</option>
                        	@endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    	<label>Semester</label>
                    	<select class="form-control" name="semester">
                    		<option>1</option>
                    		<option>2</option>
                    		<option>3</option>
                    		<option>4</option>
                    		<option>5</option>
                    	</select>
                    </div>

                    <div class="form-group">
                    	<label>Nilai</label>
                    	<input type="number" name="nilai" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
        	</div>
        </div>
    </div>
</div>
 
@endsection