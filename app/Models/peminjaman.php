<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = ['user_id', 'buku_id', 'tanggal_pinjam', 'status'];

    public function buku()
    {
        return $this->belongsTo(buku::class, 'buku_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}