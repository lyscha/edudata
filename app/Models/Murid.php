<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
    protected $fillable = [
        'user_id',
        'nisn',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'tanggal_lahir',
        'kelas_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
