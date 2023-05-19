<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderProduct extends Model
{
    use HasFactory;
    protected $table = 'header_product';

    protected $fillable = ['title','title_text','subTT'];

    protected $casts = [
      'subTT' => 'json',
    ];
}
