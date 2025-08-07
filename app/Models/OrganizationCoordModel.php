<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationCoordModel extends Model
{
    use HasFactory;

    protected $casts = [
        'coordinates' => CoordinatesCast::class,
    ];
}
