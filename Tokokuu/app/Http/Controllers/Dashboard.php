<?php

namespace App\Http\Controllers;

use App\Modeldetail_transaksi;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('cek_login');
    }
    //construct selalu di cek terlebih dahulu
    public function index()
    {
        return view('dashboard');
    }
    public function nota(){
        $data['detail_transaksi']=Modeldetail_transaksi::get();
        return view('nota',$data);
    }
}
