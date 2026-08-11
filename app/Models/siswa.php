<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class siswa extends Model
{
    protected $fillable = ['namasiswa', 'nis', 'kelas_id'] ;
    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
}

