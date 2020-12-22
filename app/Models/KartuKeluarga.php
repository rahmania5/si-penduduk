<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    public function jorong(){
        return $this->belongsTo('App\Models\Jorong');
    }

    public function penduduk(){
        return $this->hasMany('App\Models\Penduduk');
    }
}
