<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    protected $fillable = ['namaauthor'];
    public function bukus()
    {
        return $this->hasMany(buku::class, 'author_id');
    }
}
