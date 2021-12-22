<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelbarang extends Model
{
    protected $table="barang";
    protected $primaryKey="id_barang";
    public $timestamps=false;
    protected $fillable = [
        'nama_barang', 'gambar', 'harga', 'stok', 'ukuran', 'warna'
    ];
    public function Detail(){
        return $this->hasMany('App/Modeldetail_transaksi', 'id_barang');
    }
}
