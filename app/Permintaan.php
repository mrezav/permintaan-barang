<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = "permintaan";
    protected $guarded = [];

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan', 'nik','nik');
    }

    public function detail()
    {
        return $this->hasMany('App\Detail','permintaan_id','id');
    }
}
