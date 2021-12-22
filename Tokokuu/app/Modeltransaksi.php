<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeltransaksi extends Model
{
    protected $table="transaksi";
    protected $primaryKey="id_transaksi";
    public $timestamps=false;
    protected $fillable = [
        'id_transaksi', 'id_barang', 'id_kontak', 'total_harga'
    ];
    public function Kontak(){
        return $this->belongsTo('App\Modelkontak', 'id_kontak');
    }
    public function Barang(){
        return $this->belongsTo('App\Modelbarang', 'id_barang');
    }
}
