<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'level',
        'description',
    ];

    protected $dates = [
        'start',
        'end',
    ];
}
