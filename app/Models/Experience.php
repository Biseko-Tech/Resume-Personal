<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'company',
        'address',
        'title',
        'description',
    ];

    protected $dates = [
        'start',
        'end',
    ];
}
