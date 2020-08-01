<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'detail';
    protected $gurarded = [];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'kode_barang','kode');
    }

    public function permintaan()
    {
        return $this->belongsTo('App\Permintaan','permintaan_id','id');
    }
}
