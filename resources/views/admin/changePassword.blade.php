@extends('layout/index')
@section('title','Change Password')

@section('content1')
<div class='row'>
    <div class='col-md-12'>
        <div class="card">
            <div class="card-body" style="padding-right:30px">
      			<form method="POST" action="{{url('/postChangePassword')}}">
      				@if(Session::get('error'))
      					<div class="alert alert-danger">
      						<strong>Password Salah</strong>
      					</div>
      				@endif
      				{{csrf_field()}}
      				<div class="form-group">
      					<label>Password Lama</label>
      					<input type="password" name="old_pass" class="form-control">
      				</div>
      				<div class="form-group">
      					<label>Password Baru</label>
      					<input type="password" name="new_pass" class="form-control">
      					@if($errors->has('new_pass'))
      						<span class="text-danger" style="font-size: 13px;">{{$errors->first()}}</span>
      					@endif
      				</div>
      				<div class="form-group">
      					<label>Konfirmasi Password Baru</label>
      					<input type="password" name="con_new_pass" class="form-control">
      					@if($errors->has('con_new_pass'))
      						<span class="text-danger" style="font-size: 13px;">{{$errors->first()}}</span>
      					@endif
      				</div>

      				<button type="submit" class="btn btn-primary">Simpan</button>
      			</form>
            </div>
        </div>
    </div>
</div>
@endsection