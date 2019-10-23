@extends('layout.index')
@section('title','Update Siswa')
@section('content1')
    
    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
            	<div class="card-header">
            		<a href="/siswa/printNilai" class="btn btn-primary btn-sm" style="float: right;">Download Nilai  &nbsp;<i class="fa fa-download"></i></a>
            	</div>
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
			        		@foreach($data as $nil)
				        		<tr>
				        			<td>{{$nil->nama_pelajaran}}</td>
				        			<td>{{$nil->semester}}</td>
				        			<td>{{$nil->nilai}}</td>
									<td>
			                            <a href='{{url("/nilai/tambahNilai/$nil->id")}}' class="badge badge-info">Edit Nilai</a>
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