<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentWork extends Model
{
    use HasFactory;

    protected $table = 'recent_works';

    protected $fillable = [
      'imgsrc',
      'imgalt',
      'titleA',
      'titleB',
      'description',
  ];
}
