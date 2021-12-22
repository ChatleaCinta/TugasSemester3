<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorimodell extends Model
{
    protected $table="kategori";
    protected $primaryKey="id_kategori";
    public $timestamps=false;
}
