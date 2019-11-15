<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitkerja extends Model
{
    protected $table = 'unitkerja';
    protected $fillable = ['nama','kode','jumlah','user_id'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
    
    public function aspekpenilaian()
    {
    	return $this->hasMany(Aspekpenilaian::class);
    }

    


    // public function ranking()
    // {
    // 	//Mengambil nilai dulu
    // 	$total = 0;
    // 	$hitung = 1;

    // 	foreach($this->aspekpenilaian as $aspekpenilaian){
    // 		$total += $aspekpenilaian->pivot->nilaiku;
    // 		$hitung++;
    // 	}
    // 	//round digunakan untuk pembulatan nilai
    //     return round($total/$hitung);
    // }

}

   


