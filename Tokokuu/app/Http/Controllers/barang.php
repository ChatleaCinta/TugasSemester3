<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelbarang;
use Session;
use Illuminate\Support\Facades\Validator;


class barang extends Controller
{
    public function __construct()
    {
        $this->middleware('cek_login');
    }
    public function index()
    {
        $barang_list=Modelbarang::all();
        return view('barang.index', compact('barang_list'));
    }
    public function tambah(){
        $barang = Modelbarang::get();
        return view('barang.create', compact('barang'));
      }
      public function simpan_tambah(Request $req)
      {
          $this->validate($req,
          [
              'nama_barang'=>'required',
              'gambar'=>'required|image|mimes:jpg,png,jpeg',
              'stok'=>'required',
              'harga'=>'required',
              'ukuran'=>'required',
              'warna'=>'required'
              
          ]
      );
      $file=$req->file('gambar');
      $cek_upload=$file->move("gambar",$file->getClientOriginalName());
      if($cek_upload){
          $objek=array(
              'nama_barang'=>$req->nama_barang,
              'gambar'=>$file->getClientOriginalName(),
              'stok'=>$req->stok,
              'harga'=>$req->harga,
              'ukuran'=>$req->ukuran,
              'warna'=>$req->warna
          );
          return redirect('/');
    //       $cek_tambah=Modelbarang::insert($objek);
    //       if($cek_tambah){
    //           Session::flash('alert_pesan','sukses menambah barang');
    //           return redirect('/');
    //       } else {
    //           Session::flash('alert_pesan','gagal menambah barang');
    //           return redirect('/');
    //       }
    }
      }
      public function edit($id) {
        $halaman = 'barang';
        $barang = Modelbarang::findOrFail($id);
        return view('barang.edit', compact('halaman', 'barang'));
    }
    public function update(Request $request, $id)
    {
        $data = Modelbarang::findOrFail($id);
        $data->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('/');
    }
  public function show($id) {
      $halaman = 'barang';
      $barang = Modelbarang::findOrFail($id);
      return view('barang.detail', compact('halaman', 'barang'));
  }
  public function delete($id) {
      $barang = Modelbarang::findOrFail($id);
      $barang->delete();
      return redirect('/');
  }
}