<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagari extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    public $timestamps = false;

    public function jorong(){
        return $this->hasMany('App\Models\Jorong');
    }

    public function penduduk(){
        return $this->hasManyDeep(
            'App\Models\Penduduk', 
            ['App\Models\Jorong', 'App\Models\KartuKeluarga'], 
            [
                'nagari_id',
                'jorong_id',
                'keluarga_id'
            ]);
    }

}
