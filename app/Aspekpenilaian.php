<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspekpenilaian extends Model
{
    protected $table = 'aspekpenilaian';
    protected $fillable = ['id','nama','plan','pencapaian','unitkerja_id'];

    public function unitkerja()
    {
    	return $this->belongsTo(Unitkerja::class);
    }

}



