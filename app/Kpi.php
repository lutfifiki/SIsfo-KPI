<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table = 'kpi';
    protected $fillable = ['kode','devisi','standart'];

    public function karyawan()
    {
    	return $this->belongsToMany(Karyawan::class)->withPivot('pencapaian');
    }
}
