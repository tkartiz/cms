<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes; //　追記

class Announce extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'show',
        'date',
        'title',
        'content1',
        'content2',
        'content3',
        'content4',
        'content5',
        'content6',
    ];
}
