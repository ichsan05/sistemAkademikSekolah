@extends('layout/index')
@section('title','Data Pelajaran')

@section('content1')

<h3 class="mb-4" style="display:inline-block">Data Pelajaran</h3>
<a href="{{url('/addPelajaran')}}" style="float:right" class="btn btn-info btn-sm">Tambah Pelajaran</a>

<ol class='breadcrumb'>
    <li class='breadcrumb-item'>Dashboard</li>
    <li class='breadcrumb-item active'>Data Pelajaran</li>
</ol>


<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-body" style="padding-right:30px">
                <table class="data table table-striped table-bordered" >
                    <thead class='bg-white'>
                        <tr>
                            <th>Kode Pelajaran</th>
                            <th>Nama Pelajaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pel)
                            <tr>
                                <td>{{$pel->kode_pelajaran}}</td>
                                <td>{{$pel->nama_pelajaran}}</td>

                                <td>
                                    <a href='{{url("updatePelajaran/$pel->id")}}' class="badge badge-primary">Edit</a>
                                    <a href='{{url("deletePelajaran/$pel->id")}}' class="badge badge-danger">Delete</a>
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