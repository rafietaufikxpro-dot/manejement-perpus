<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $fillable = ['judulbuku', 'author_id', 'kategori_id', 'jumlahbuku'];
    public function author()
    {
        return $this->belongsTo(author::class, 'author_id');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
