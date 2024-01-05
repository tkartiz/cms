<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'stamp',
        'release',
        'category',
        'name',
        'logo',
        'logopath',
        'concept',
        'filename1',
        'filepath1',
        'filename2',
        'filepath2',
        'filename3',
        'filepath3',
        'filename4',
        'filepath4',
        'content',
    ];

    protected $casts = [
        'content' => 'json',
    ];
}