<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelkontak;
use App\Kategorimodell;
use Session;
use Illuminate\Support\Facades\Validator;

class kontak extends Controller
{
    public function index()
    {
        $kontak_list=Modelkontak::all();
        return view('kontak.index', compact('kontak_list'));
    }
    public function tambah()
    {
        $kontak = Modelkontak::get();
        $kategori = Kategorimodell::all();
        return view('kontak.create', compact('kontak', 'kategori'));
    }public function simpan_tambah(Request $req)
    {
        $this->validate($req,
        [
            'nama'=>'required',
            'email'=>'required',
            'nohp'=>'required',
            'alamat'=>'required',
            'username'=>'required',
            'password'=>'required'
            
        ]
    );
    $cek_upload=Modelkontak::create($req->all());
    if($cek_upload){
        $objek=array(
            'nama'=>$req->nama,
            'email'=>$req->email,
            'nohp'=>$req->nohp,
            'alamat'=>$req->alamat,
            'username'=>$req->username,
            'password'=>md5($req->password),
            'status'=>$req->status,
            'id_kategori'=>$req->id_kategori
        );
        return redirect('kontak');
        // $cek_tambah=Modelkontak::insert($objek);
        // if($cek_tambah){
        //     Session::flash('alert_pesan','sukses menambah barang');
        //     return redirect('kontak');
        // } else {
        //     Session::flash('alert_pesan','gagal menambah barang');
        //     return redirect('kontak');
        // }
    }
}
    public function edit($id) {
        $halaman = 'kontak';
        $kontak = Modelkontak::findOrFail($id);
        $kategori = Kategorimodell::all();
        return view('kontak.edit', compact('halaman', 'kontak', 'kategori'));
    }
    public function update(Request $request, $id)
    {
        $data = Modelkontak::findOrFail($id);
        $data->update($request->all());
        if($request->hasFile('kontak')){
            $request->file('kontak')->move('images/',$request->file('kontak')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect('kontak');
    }
    public function delete($id) {
        $kontak = Modelkontak::findOrFail($id);
        $kontak->delete();
        return redirect('kontak');
    }
}
    // public function store(Request $req)
    // {
    //     $validator=Validator::make($req->all(),
    //     [
    //         'nama'=>'required',
    //         'email'=>'required'
    //     ]
    // );
    // if($validator->fails()){
    //     return Response()->json($validator->errors());
    // }
    // $simpan=Modelkontak::create([
    //         'nama'=>$req->nama,
    //         'email'=>$req->email,
    //         'nohp'=>$req->nohp,
    //         'alamat'=>$req->alamat,
    //         'foto'=>'-',
    //         'username'=>$req->username,
    //         'password'=>md5($req->password),
    //         'status'=>$req->status,
    //         'id_kategori'=>$req->id_kategori
    // ]);
    // if($simpan){
    //     return Response()->json(['status'=>1]);
    // } else {
    //     return Response()->json(['status'=>0]);
    //     }
    // }
    // public function show(){
    //     $data_user=Modelkontak::get();
    //     $arr_data=array();
    //     foreach ($data_user as $dt_user) {
    //         $arr_data[]=array(
    //             'id'=>$dt_user->id_kontak,
    //             'nama_user'=>$dt_user->nama,
    //             'nomor_telepon'=>$dt_user->nohp,
    //             'alamat_lengkap'=>$dt_user->alamat,
    //             'id_kategori'=>$dt_user->id_kategori,
    //             'status_user'=>$dt_user->status
    //         );
    //     }
    //     return Response()->json($arr_data);
    // }
    // public function edit(Request $req, $id)
    // {
    //     $validator=Validator::make($req->all(),
    //     [
    //         'nama'=>'required',
    //         'email'=>'required'
    //     ]
    //     );
    //     if($validator->fails()){
    //         return Response()->json($validator->errors());
    //     }
    //     $edit=Modelkontak::where('id_kontak',$id)->update([
    //         'nama'=>$req->nama,
    //         'email'=>$req->email,
    //         'nohp'=>$req->nohp,
    //         'alamat'=>$req->alamat,
    //         'foto'=>'-',
    //         'username'=>$req->username,
    //         'password'=>md5($req->password),
    //         'status'=>$req->status,
    //         'id_kategori'=>$req->id_kategori
    //     ]);
    //     if($edit){
    //         return Response()->json(['status'=>1]);
    //     } else {
    //         return Response()->json(['status'=>0]);
    //         }
    // }
    // public function delete($id){
    //     {
    //         $delete=Modelkontak::where('id_kontak',$id)->delete();
    //         if($delete){
    //             return Response()->json(['status'=>1]);
    //         } else {
    //             return Response()->json(['status'=>0]);
    //             }
    //     }
    // }
