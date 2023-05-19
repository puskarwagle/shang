<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExploreTech extends Model
{
  use HasFactory;

  protected $table = 'explore_tech';

  protected $fillable = ['icon','title','links'];
  
  protected $casts = [
    'links' => 'json',
  ];
}
