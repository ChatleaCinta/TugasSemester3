@extends('template')

@section('content')
<center>
<div class="container" style="background:lavender;border-radius:20px;padding:20px 20px 20px 20px;width:50%;margin-top:7rem">
<div style="margin-top:7rem">
    <div id="kontak">
    <h2>Edit Kontak</h2>

    <form action="{{ url('kontak/' . $kontak->id_kontak . '/update') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="nama" class="control-label">Nama</label>
            <input name="nama" type="text" class="form-control" value="{{$kontak->nama}}">
    </div>

    <div class="form-group">
    <label for="email" class="control-label">Email</label>
            <input name="email" type="text" class="form-control" value="{{$kontak->email}}">
    </div>
    
    <div class="form-group">
    <label for="alamat" class="control-label">Alamat</label>
            <input name="alamat" type="text" class="form-control" value="{{$kontak->alamat}}">
    </div>
    <div class="form-group">
    <label for="username" class="control-label">Username</label>
            <input name="username" type="text" class="form-control" value="{{$kontak->username}}">
    </div>

    <div class="form-group">
    <label for="password" class="control-label">Password</label>
            <input name="password" type="text" class="form-control" value="{{$kontak->password}}">
    </div>
    <div class="form-group">
    <label for="status" class="control-label">Status</label>
            <input name="status" type="text" class="form-control" value="{{$kontak->status}}">
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
    </center>
@stop