<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Modelkontak extends Model
{
    protected $table="kontak";
    protected $primaryKey="id_kontak";
    public $timestamps=false;
    protected $fillable = [
        'id_kontak', 'nama', 'email', 'nohp', 'alamat', 'username', 'password', 'status', 'id_kategori'
    ];
    public function Kategori(){
        return $this->belongsTo('App\Kategorimodell', 'id_kategori');
    }
}
