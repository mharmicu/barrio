<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Encryptable\Encryptable;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'location',
        'persons',
        'narrative',
    ];

    protected $casts = [
        'type' => Encryptable::class,
        'location' => Encryptable::class,
        'persons' => Encryptable::class,
        'narrative' => Encryptable::class,
    ];
}
