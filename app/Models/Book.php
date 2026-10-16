<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Daftar kolom yang diizinkan untuk diisi pengguna
    protected $fillable = ['title', 'author', 'year'];
}