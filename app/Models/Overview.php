<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $table = 'overviews';

    protected $fillable = [
      'imgsrc',
      'imgalt',
      'titleLi',
      'text1',
      'text2',
      'text3',
      'link',
    ];

}
