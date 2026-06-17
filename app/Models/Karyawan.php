<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama',
        'jabatan',
        'divisi',
        'alamat',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lemburs()
    {
        return $this->hasMany(Lembur::class);
    }
}