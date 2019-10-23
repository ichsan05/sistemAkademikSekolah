@extends('layout/index')
@section('title','Nilai')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Data Nilai</h3>
{{-- <a href="{{url('/addPelajaran')}}" style="float:right" class="btn btn-info btn-sm">Tambah Pelajaran</a> --}}

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item'><a href="{{url('/nilai')}}">Data Kelas</a></li>
    <li class='breadcrumb-item active'>{{$kelas->nama_kelas}}</li>

</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
        	<div class="card-body">
        		<table class="data table table-striped table-bordered">
		        	<thead>
		        		<tr>
			        		<th>No</th>
			        		<th>Nama Siswa</th>
			        		<th>Nisn</th>
			        		<th>Kelas</th>
			        		<th>Action</th>
			        	</tr>
		        	</thead>
		        	
		        	@php $no = 1; @endphp
		        	<tbody>
		        		@foreach($siswa as $sis)
			        		<tr>
			        			<td>{{$no++}}</td>
			        			<td>{{$sis->nama}}</td>
			        			<td>{{$sis->nisn}}</td>
			        			<td>{{$sis->nama_kelas}}</td>
								<td>
		                            <a href='{{url("/nilai/lihatNilai/$sis->id")}}' class="badge badge-primary">Lihat Nilai</a>
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