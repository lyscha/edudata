<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    public function murid()
    {
        return $this->hasMany(\App\Models\Murid::class, 'kelas_id');
    }
    public function wali_kelas()
    {
        return $this->belongsTo(\App\Models\Murid::class, 'wali_kelas');
    }
}
