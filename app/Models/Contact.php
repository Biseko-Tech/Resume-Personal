<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'owner_title',
        'owner_email',
        'owner_mobile',
        'owner_address',
    ];
}
