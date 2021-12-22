<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modelkontak;
use Validator;

class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function cek(Request $req)
    {
        $this->validate($req,['username'=>'required'],
                             ['password'=>'required']);
        $proses=Modelkontak::where('username', $req->username)->where('password', md5($req->password));
        if($proses->count()>0){
            $data=$proses->first();
            Session::put('id_kontak', $data->id_kontak);
            Session::put('username', $data->username);
            Session::put('password', $data->password);
            Session::put('nama', $data->nama);
            Session::put('status', $data->status);
            Session::put('login_status',true);
            return redirect('/');
        } else {
            Session::flash('pesan', 'invalid ussername and password');
            return redirect('login');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
