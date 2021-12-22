@extends('template')

@section('content')

<div class="container">
  <div class="row">
    <div class="mt-3">
      <div class ="col-md-6">
      <div id="kontak">
        <div class="body1">
          <h2>Tambah Kontak</h2>
        </div><br>
          <form action="{{ url('/kontak/simpan_tambah')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama" class="control-label">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="nohp" class="control-label">No telp</label>
              <input type="text" name="nohp" id="nohp" class="form-control">
            </div>
            <div class="form-group">
              <label for="alamat" class="control-label">Alamat</label>
              <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
            <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="status" class="control-label">Status</label>
              <input type="text" name="status" id="status" class="form-control">
            </div>
            <div class="form-group">
              <label for="kategori" class="control-label">Kategori</label>
              <select name="id_kategori" class="form-control">
              @foreach($kategori as $kat)
              <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
              @endforeach
              </select>
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