@extends('layout/index')
@section('title','Data Nilai')

@section('content1')


 <h3 class="mb-4" style="display:inline-block">Tambah Nilai</h3>
 <a href='{{url("/nilai/tambahNilai/$idSiswa")}}' style="float:right" class="btn btn-info btn-sm">Tambah Nilai</a>

    <ol class='breadcrumb'>
	    <li class='breadcrumb-item'>Dashboard</li>
	    <li class='breadcrumb-item'><a href="{{url('/nilai')}}">Data Kelas</a></li>
	    <li class='breadcrumb-item'><a href="{{url("/nilai/resKelas/$breadKelas->kelas")}}">Data Siswa</a></li>
	    <li class='breadcrumb-item active'>Siswa</li>
	</ol>

<div class='row'>
    <div class='col-md-12'>
        <div class="card">
        	<div class="card-body">
        		<table class="data table table-striped ">
		        	<thead>
		        		<tr>
			        		<th>Nama Pelajaran</th>
			        		<th>Semester</th>
			        		<th>Nilai</th>
			        		<th>Action</th>
			        	</tr>
		        	</thead>
		        	
		        	@php $no = 1; @endphp
		        	<tbody>
		        		@foreach($nilai as $nil)
			        		<tr>
			        			<td>{{$nil->nama_pelajaran}}</td>
			        			<td>{{$nil->semester}}</td>
			        			<td>{{$nil->nilai}}</td>
								<td>
		                            <a href='{{url("/nilai/editNilai/$nil->id")}}' class="badge badge-info">Edit Nilai</a>
		                        </td>
			        		</tr>
			        	@endforeach
		        	</tbody>
		        </table>
        	</div>
        </div>
    </div>
</div>
 
@endsection