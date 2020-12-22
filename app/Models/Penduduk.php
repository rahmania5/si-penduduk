<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $dateFormat = 'Y-m-d';

    public function kartu_keluarga(){
        return $this->belongsTo('App\Models\KartuKeluarga', 'keluarga_id');
    }

    public function level_pendidikan(){
        return $this->belongsTo('App\Models\LevelPendidikan');
    }

    public function pekerjaan(){
        return $this->belongsTo('App\Models\Pekerjaan');
    }

    public function kewarganegaraan(){
        return $this->belongsTo('App\Models\Kewarganegaraan');
    }

    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }
}
