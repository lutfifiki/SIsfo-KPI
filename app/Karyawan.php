<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['id','user_id','unitkerja_id','nama_depan','nama','jenis_kelamin','tempat_lahir','ttl','alamat','avatar'];

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.png');
    	}

    	return asset('images/' .$this->avatar);
    }

    public function unitkerja()
    {
        return $this->belongsTo(Unitkerja::class);
    }

}
