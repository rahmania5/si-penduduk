<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function nagari(){
        return $this->belongsTo('App\Models\Nagari');
    }

    public function kartu_keluarga(){
        return $this->hasMany('App\Models\KartuKeluarga');
    }
}
