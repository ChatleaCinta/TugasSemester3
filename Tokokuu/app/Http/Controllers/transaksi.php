<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelbarang;
use Cart;
use App\Modeltransaksi;
use App\Modeldetail_transaksi;
use Session;


class Transaksi extends Controller
{
    public function index()
    {
    	if(Session('status')!="kasir"){
			return abort(404);
		}
    	$data['barang']=Modelbarang::get();

    	return view('transaksi',$data);
    }
    public function tambah($id_barang)
    {
    	if(Session('status')!="kasir"){
			return abort(404);
		}
    	$dt_barang=Modelbarang::where('id_barang',$id_barang)->first();
    	$items=array(
    		'id'=>$id_barang,
    		'name'=>$dt_barang->nama_barang,
    		'price'=>$dt_barang->harga,
    		'quantity'=>1,
    		);
    	Cart::add($items);
    	return redirect('transaksi');
    }
    public function clear_all()
    {
    	if(Session('status')!="kasir"){
			return abort(404);
		}
    	Cart::clear();
    	return redirect('transaksi');
    }
    public function simpan_cart_db()
    {
    	if(Session('status')!="kasir"){
			return abort(404);
		}
    	$data=array(
    		'tgl_transaksi'=>date('Y-m-d'),
    		'id_user'=>Session::get('id_kontak'),
    		'total_harga'=>0
    	);
    	$proses_simpan=Modeltransaksi::insert($data);
    	if($proses_simpan){
    		$detil_nota=Modeltransaksi::where('id_user',Session::get('id_kontak'))->orderBy('id_transaksi','desc')->first();
    		foreach(Cart::getContent() as $crt){
    			$dt_cart=array(
    				'id_trans'=>$detil_nota->id_transaksi,
    				'id_barang'=>$crt->id,
    				'qty'=>$crt->quantity
    			);
    			Modeldetail_transaksi::insert($dt_cart);
    		}
    		$data=array(
    			'total_harga'=>Cart::getTotal()
    		);
    		Modeltransaksi::where('id_transaksi',$detil_nota->id_trans)->update($data);
    		Cart::clear();
    	}
    	return redirect('transaksi');
    }
    public function hps_item($id_barang)
    {
    	if(Session('status')!="kasir"){
			return abort(404);
		}
    	Cart::remove($id_barang);
    	return redirect('transaksi');
    }
}
