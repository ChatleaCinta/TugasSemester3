@extends('template')

@section('content')

<div class="container">
  <div class="row">
    <div class="mt-3">
      <div class ="col-md-6">
      <div id="barang">
        <div class="body1">
          <h2>Tambah Barang</h2>
        </div><br>
        
          <form action="{{ url('/barang/simpan_tambah')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="gambar" class="control-label">Gambar</label>
              <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_barang" class="control-label">Nama Barang</label>
              <input type="text" name="nama_barang" id="nama_barang" class="form-control">
            </div>
            <div class="form-group">
              <label for="stok" class="control-label">Stok</label>
              <input type="text" name="stok" id="stok" class="form-control">
            </div>
            <div class="form-group">
              <label for="harga" class="control-label">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control">
            </div>
            <div class="form-group">
              <label for="ukuran" class="control-label">Ukuran</label>
              <input type="text" name="ukuran" id="ukuran" class="form-control">
            </div>
            <div class="form-group">
              <label for="warna" class="control-label">Warna</label>
              <input type="text" name="warna" id="warna" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

@stop