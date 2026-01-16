<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal_publikasi',
        'penulis',
		'isbn',
		'cover',
    ];
}
