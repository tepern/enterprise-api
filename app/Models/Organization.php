<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
   
    /**
     *
     * @var array
     */
    protected $casts = [
        'phones' => 'array',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'organization_activity', 'organization_id', 'activity_id');
    }
}
