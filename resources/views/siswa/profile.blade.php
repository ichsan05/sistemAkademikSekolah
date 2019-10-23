@extends('layout.index')
@section('title','Profile Siswa')
@section('content1')
	
	
    <div class='row'>
        <div class='col-md-12'>
            <div class="card">
                <div class="card-body">
                	@if(session('success'))
                		<div class="alert alert-success">
                			{{session('success')}}
                		</div>
                	@endif

                	<table class="table-borderless table">
                		<tr>
                			<td>Nisn</td>
                			<td>{{$data->nisn}}</td>
                		</tr>
                		<tr>
                			<td>Nama</td>
                			<td>{{$data->nama}}</td>
                		</tr>
                		<tr>
                			<td>Kelas</td>
                			<td>{{$data->nama_kelas}}</td>
                		</tr>
                		<tr>
                			<td>Email</td>
                			<td>{{$data->email}}</td>
                		</tr>
                		<tr>
                			<td>Alamat</td>
                			<td>{{$data->alamat}}</td>
                		</tr>
                		<tr>
                			<td>Agama</td>
                			<td>{{$data->agama}}</td>
                		</tr>
                		<tr>
                			<td>Jenis Kelamin</td>
                			<td>{{$data->jenis_kelamin}}</td>
                		</tr>
                		<tr>
                			<td>Ayah</td>
                			<td>{{$data->nama_ayah}}</td>
                		</tr>
                		<tr>
                			<td>Ibu</td>
                			<td>{{$data->nama_ibu}}</td>
                		</tr>
                		<tr>
                			<td>No Hp orang Tua</td>
                			<td>{{$data->nmr_ortu}}</td>
                		</tr>
                	</table>

                	<a href='{{url("/siswa/updateProfile/$data->id")}}' class="btn btn-primary">Update Profile</a>
                </div>
            </div>
        </div>
    </div>

@endsection
