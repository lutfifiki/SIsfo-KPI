<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
	protected $table = 'unitkerja';
    protected $fillable = ['nama','kode','jumlah']; 

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }

}