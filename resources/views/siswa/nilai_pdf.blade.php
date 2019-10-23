<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class='row'>
    <div class='col-md-12'>
    	<center>
			<h1>Daftar Nilai Siswa</h1>php
		</center>
        <div class="card">
            <div class="card-body">
            	<table class="data table table-striped " width="730px">
		        	<thead>
		        		<tr>
			        		<th>Nama Pelajaran</th>
			        		<th>Semester</th>
			        		<th>Nilai</th>
			        	</tr>
		        	</thead>
		        	
		        	@php $no = 1; @endphp
		        	<tbody>
		        		@foreach($data as $nil)
			        		<tr>
			        			<td>{{$nil->nama_pelajaran}}</td>
			        			<td>{{$nil->semester}}</td>
			        			<td>{{$nil->nilai}}</td>
			        		</tr>
			        	@endforeach
		        	</tbody>
		        </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>