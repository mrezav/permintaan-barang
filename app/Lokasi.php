<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $guarded = [];

    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
