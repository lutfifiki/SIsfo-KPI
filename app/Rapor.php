<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
	protected $table = 'unitkerja';
    protected $fillable = ['id','nama','user_id']; 

}