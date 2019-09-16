<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['id','user_id','nama_depan','nama','jenis_kelamin','alamat','avatar'];

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.png');
    	}

    	return asset('images/' .$this->avatar);
    }

    public function kpi()
    {
    	return $this->belongsToMany(Kpi::class)->withPivot(['pencapaian'])->withTimeStamps();
    }
}
