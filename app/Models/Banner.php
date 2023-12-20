<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'stamp',
        'release',
        'filename_pc',
        'filepath_pc',
        'filename_sp',
        'filepath_sp',
    ];
}
