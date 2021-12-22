@extends('template')

@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="header"> 
                <h2>Detail Barang</h2>
            </div>
            <div class="col-md-4">
            <img style="padding-top: 5%; width: 95%; height: 75%" src="{{asset('images/'.$barang->gambar)}}" class="card-img" alt="...">
            </div>
                <table class="table table-hover table-stripped">
                <tr>
            <th>Nama Barang</th>
            <td>{{ $barang->nama_barang }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $barang->stok }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp{{ $barang->harga }},00</td>
        </tr>
        <tr>
            <th>Ukuran</th>
            <td>{{ $barang->ukuran }}</td>
        </tr>
        <tr>
            <th>Warna</th>
            <td>{{ $barang->warna }}</td>
        </tr>
    </table>
    <button type="button" class="btn btn-warning" onclick="window.location='/Tokokuu/public/'">Kembali</button>
            </div>
        </div>
    </div>
@stop