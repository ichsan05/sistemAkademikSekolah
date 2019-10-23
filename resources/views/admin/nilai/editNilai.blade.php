@extends('layout/index')
@section('title','Edit Nilai')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Edit Nilai</h3>
{{-- <a href="{{url('/addPelajaran')}}" style="float:right" class="btn btn-info btn-sm">Edit Pelajaran</a> --}}

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item'><a href="{{url('/nilai')}}">Data Nilai</a></li>
    <li class='breadcrumb-item active'>Edit Nilai</li>

</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
        	<div class="card-body">
        		<form action="{{url('/nilai/postUpdateNilai')}}" method="POST">
                    @if ($m = Session::get('error'))
                        <div class="alert alert danger">
                            <strong class="text-danger">{{$m}}</strong>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$nilai->id}}">
                    <input type="hidden" name="id_siswa" value="{{$nilai->id_siswa}}">
                    <div class="form-group">
                        <label for="nisn">Pelajaran</label>
                        <select class="form-control" name="pelajaran">
                        	@foreach(DB::table('pelajaran')->get() as $pel)
                        		<option value="{{$pel->id}}" @if ($nilai->id_pelajaran == $pel->id) {{'selected'}} @endif>{{$pel->nama_pelajaran}}</option>
                        	@endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    	<label>Semester</label>
                    	<select class="form-control" name="semester" readonly disabled="">
                    		<option @if ($nilai->semester == 1) {{'selected'}} @endif >1</option>
                    		<option @if ($nilai->semester == 2) {{'selected'}} @endif >2</option>
                    		<option @if ($nilai->semester == 3) {{'selected'}} @endif >3</option>
                    		<option @if ($nilai->semester == 4) {{'selected'}} @endif >4</option>
                    		<option @if ($nilai->semester == 5) {{'selected'}} @endif >5</option>
                    	</select>
                    </div>

                    <div class="form-group">
                    	<label>Nilai</label>
                    	<input type="number" name="nilai" class="form-control" value="{{$nilai->nilai}}">
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