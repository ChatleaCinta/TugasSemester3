@extends('template')
@section('content')

<h2>Transaksi</h2>
<div class="row"> 
<div class="col-md-8">
	<table class="table table-hover table-striped">
		<tr>
			<th>Gambar</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Beli</th>
		</tr>
		@php 
			$no=0; 
		@endphp
		@foreach($barang as $barang)
		@php 
			$no++; 
		@endphp
		<tr>
			<td><img src="{{asset('gambar/'.$barang->gambar)}}" width="70"></td>
			<td>{{$barang->nama_barang}}</td>
			<td>{{$barang->harga}}</td>
			<td><a href="{{url('tambah_brng/'.$barang->id_barang)}}" class="btn btn-success">beli</a></td>
		</tr>
		@endforeach
	</table>
	</div>

	<div class="col-md-4"> 
		<a href="{{url('transaksi/clear_all_cart')}}" class="btn btn-danger">Clear Cart</a>
		<span style="float:right"><b>Rp. {{Cart::getTotal()}}</b></span>
		<table class="table table-hover table-striped">
		<tr>
			<th>Nama Barang</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
		@php 
			$no=0; 
		@endphp
		@foreach(Cart::getContent() as $crt)
		@php 
			$no++; 
		@endphp
		<tr>
			<td>{{$crt->name}}</td>
			<td>{{$crt->quantity}}</td>
			<td>{{$crt->price}}</td>
			<td><a href="{{url('transaksi/hps_item/'.$crt->id)}}" class="btn btn-danger">X</a></td>
		</tr>
		@endforeach
	</table>
	<a href="{{url('transaksi/simpan_cart_db')}}" class="btn btn-warning">simpan</a>
	</div>	
</div>
@stop