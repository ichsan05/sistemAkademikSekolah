@extends('layout/index')
@section('title','Data Guru')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Data Guru</h3>
<a href="{{url('/addGuru')}}" style="float:right" class="btn btn-info btn-sm">Tambah Guru</a>

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item active'>Data Guru</li>
</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-body" style="padding-right:30px">
                <table class="data table table-striped table-bordered" >
                    <thead class='bg-white'>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $data)
                            <tr>
                                <td>{{$data->nip}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jenis_kelamin}}</td>
                                <td>{{$data->tempat_lahir}}</td>
                                <td>{{$data->tgl_lahir}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->telpon}}</td>
                                <td>
                                    <a href='{{url("updateGuru/$data->id")}}' class="badge badge-primary">Edit</a>
                                    <a href='{{url("deleteGuru/$data->id")}}' class="badge badge-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>              
                {{ $guru->links() }}    
            </div>
        </div>
    </div>
</div>
 
@endsection