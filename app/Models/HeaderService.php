<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderService extends Model
{
    use HasFactory;
    protected $table = 'header_service';

    protected $fillable = ['title','title_text','subTT'];

    protected $casts = [
      'subTT' => 'json',
    ];
  }
