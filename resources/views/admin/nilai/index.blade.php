@extends('layout/index')
@section('title','Data Pelajaran')

@section('content1')



<div class='row'>
    <div class='col-md-12'>
        @foreach($kelas as $kel)
            <div class="card list-nilai">
                <div class="card-body">
                    <a href='{{url("/nilai/resKelas/$kel->id")}}' style="color: #658db8;">{{$kel->nama_kelas}}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
 
@endsection