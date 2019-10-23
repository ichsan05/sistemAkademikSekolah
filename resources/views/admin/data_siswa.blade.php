@extends('layout/index')
@section('title','Data Siswa')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Data Siswa</h3>
<a href="{{url('/addSiswa')}}" style="float:right" class="btn btn-info btn-sm">Tambah Siswa</a>
<a href="{{url('/addSiswaExcel')}}" style="float:right" class="btn btn-success btn-sm">Tambah Siswa Excel</a>

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item active'>Data Siswa</li>
</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-body" style="padding-right:30px">
                <table class="data table table-striped table-bordered" >
                    <thead class='bg-white'>
                        <tr>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                            <td> {{$item->nisn}}</td>
                            <td> {{$item->nama}}</td>
                            <td> {{$item->alamat}}</td>
                            <td> {{$item->agama}}</td>
                            <td> {{$item->jenis_kelamin}}</td>
                            <td> {{$item->email}}</td>
                                
                            <td>
                                <a href='{{url("updateSiswa/$item->id")}}' class="badge badge-primary">Edit</a>
                                <a href='{{url("deleteSiswa/$item->id")}}' class="badge badge-danger">Delete</a>
                                </td>
                            {{-- <td></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>                        
            </div>
        </div>
    </div>
</div>
 
@endsection