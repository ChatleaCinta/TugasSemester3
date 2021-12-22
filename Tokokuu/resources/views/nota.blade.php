@extends('template')
@section('content')

<h2>Nota</h2>
<div class="row"> 
<div class="col-md-8">
	<table class="table table-hover table-striped">
		<tr>
			<th>No</th>
			<th>ID transaksi</th>
			<th>Nama Barang</th>
			<th>Qty</th>
		</tr>
		@php 
			$no=0; 
		@endphp
		@foreach($detail_transaksi as $barang)
		@php 
			$no++; 
		@endphp
		<tr>
            <td>{{$no}}</td>
			<td>{{$barang->id_trans}}</td>
			<td>{{$barang->barang->nama_barang}}</td>
			<td>{{$barang->qty}}</td>
		</tr>
		@endforeach
	</table>
	</div>
@stop