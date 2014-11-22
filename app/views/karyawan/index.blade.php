@extends('layout.main')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Karyawan</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
			<th>No</th>
			<th>Nama</th>
			</thead>
			<tbody>
			@foreach($listKaryawan as $karyawan)
			<tr>
				<td>{{$karyawan->id}}</td>
				<td>{{$karyawan->nama}}</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop