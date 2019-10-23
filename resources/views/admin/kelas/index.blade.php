@extends('layout/index')
@section('title','Data Kelas')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Data Kelas</h3>
<a href="{{url('/addKelas')}}" style="float:right" class="btn btn-info btn-sm">Tambah Kelas</a>

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item active'>Data Kelas</li>
</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-body" style="padding-right:30px">
                <table class="data table table-striped table-bordered" >
                    <thead class='bg-white'>
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pel)
                            <tr>
                                <td>{{$pel->kode_kelas}}</td>
                                <td>{{$pel->nama_kelas}}</td>

                                <td>
                                    <a href='{{url("updateKelas/$pel->id")}}' class="badge badge-primary">Edit</a>
                                    <a href='{{url("deleteKelas/$pel->id")}}' class="badge badge-danger">Delete</a>
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