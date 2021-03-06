<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = [];

    public function lokasi()
    {
        return $this->belongsTo('App\Lokasi', 'kode_lokasi','kode');
    }

    public function detail()
    {
        return $this->hasMany('App\Detail','kode_barang','kode');
    }
}
