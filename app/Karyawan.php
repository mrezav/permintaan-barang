<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $guarded = [];

    public function permintaan()
    {
        return $this->hasMany('App\Permintaan','nik','nik');
    }
}
