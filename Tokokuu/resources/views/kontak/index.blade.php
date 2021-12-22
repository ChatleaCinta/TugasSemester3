@extends('template')

@section('content')
    <div class="col-xs-12">
        <div class="card">
            <div class="header"> 
                <h2>Data Kontak</h2>
            </div>
            <div class="body">
                @if(Session::get('alert_pesan'))
                <div class="alert alert-success">
                    <strong>((Session::get('alert_pesan')}}</strong>
                </div>
                @endif
                <table class="table table-hover table-stripped">
                    <tr>
                        <td>NO</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>No Telp</td>
                        <td>Alamat</td>
                        <td>Status</td>
                        <td>Username</td>
                        <td>Aksi</td>
                    </tr>
                    @php $no=0; @endphp
                    @foreach($kontak_list as $kontak)
                    @php $no++; @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$kontak->nama}}</td>
                        <td>{{$kontak->email}}</td>
                        <td>{{$kontak->nohp}}</td>
                        <td>{{$kontak->alamat}}</td>
                        <td>{{$kontak->status}}</td>
                        <td>{{$kontak->username}}</td>
                        <td>
                        @if(Session::get('status')=='admin')
                        <a href="{{ url('kontak/' . $kontak->id_kontak . '/edit') }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('kontak/' . $kontak->id_kontak . '/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                @if(Session::get('status')=='admin')
                <a href="{{ url('kontak/tambah') }}" class="btn btn-primary">Tambah Kontak</a>
                @endif
            </div>
        </div>
    </div>
@stop