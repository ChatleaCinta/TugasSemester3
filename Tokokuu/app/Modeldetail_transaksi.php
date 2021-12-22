<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeldetail_transaksi extends Model
{
    protected $table="detail_transaksi";
    protected $primaryKey="id_detail";
    public $timestamps=false;
    

    public function Barang(){
        return $this->belongsTo('App\Modelbarang', 'id_barang');
    }
    
}
