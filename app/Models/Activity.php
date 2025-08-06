<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class, 'organization_activity', 'activity_id', 'organization_id');
    }
}
