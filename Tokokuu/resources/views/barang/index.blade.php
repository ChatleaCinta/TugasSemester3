@extends('template')

@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="header"> 
                <h2>Data Barang</h2>
            </div>
            <div class="body">
                @if(Session::get('alert_pesan'))
                <div class="alert alert-success">
                    <strong>((Session::get('alert_pesan')}}</strong>
                </div>
                @endif
                <table class="table table-hover table-stripped">
                    <tr>
                        <td>Nama Barang</td>
                        <td>Stok</td>
                        <td>Harga</td>
                        <td>Ukuran</td>
                        <td>Aksi</td>
                    </tr>
                    @php $no=0; @endphp
                    @foreach($barang_list as $barang)
                    @php $no++; @endphp
                    <tr>
                        <td>{{$barang->nama_barang}}</td>
                        <td>{{$barang->stok}}</td>
                        <td>{{$barang->harga}}</td>
                        <td>{{$barang->ukuran}}</td>
                        <td>
                        <a href="{{ url('barang/' . $barang->id_barang) }}" class="btn btn-success">Detail</a>
                        @if(Session::get('status')=='admin')
                        <a href="{{ url('barang/' . $barang->id_barang . '/edit') }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('barang/' . $barang->id_barang . '/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                @if(Session::get('status')=='admin')
                <a href="{{ url('barang/tambah') }}" class="btn btn-primary">Tambah Barang</a>
                @endif
            </div>
        </div>
    </div>
@stop