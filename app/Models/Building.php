<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoordinatesCast as AsCoordinates;

class Building extends Model
{
    use HasFactory;

    protected $casts = [
        'coordinates' => AsCoordinates::class,
    ];
}
