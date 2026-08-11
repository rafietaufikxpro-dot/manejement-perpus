<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['namakategori']  ;
    public function bukus()
    {
        return $this->hasMany(buku::class, 'kategori_id');
    }
}
