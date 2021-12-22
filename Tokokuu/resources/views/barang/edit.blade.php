@extends('template')

@section('content')
<center>
<div class="container" style="background:lavender;border-radius:20px;padding:20px 20px 20px 20px;width:50%;margin-top:7rem">
<div style="margin-top:7rem">
    <div id="barang">
    <h2>Edit Barang</h2>

    <form action="{{ url('barang/' . $barang->id_barang . '/update') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="nama_barang" class="control-label">Nama</label>
            <input name="nama_barang" type="text" class="form-control" value="{{$barang->nama_barang}}">
    </div>

    <div class="form-group">
    <label for="stok" class="control-label">Stok</label>
            <input name="stok" type="text" class="form-control" value="{{$barang->stok}}">
    </div>
    
    <div class="form-group">
    <label for="harga" class="control-label">Harga</label>
            <input name="harga" type="text" class="form-control" value="{{$barang->harga}}">
    </div>
    <div class="form-group">
    <label for="ukuran" class="control-label">Ukuran</label>
            <input name="ukuran" type="text" class="form-control" value="{{$barang->ukuran}}">
    </div>
    <div class="form-group">
    <label for="warna" class="control-label">Warna</label>
            <input name="warna" type="text" class="form-control" value="{{$barang->warna}}">
    </div>
    <div class="form-group">
    <label for="gambar" class="control-label">Gambar</label>
            <input name="gambar" type="file" class="form-control" style="padding:10px 10px 10px 10px">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </center>
@stop