<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    public function scopeSearch($query, $search)
    {
        $query->where('description', 'like', '%' . $search . '%')
            ->orWhereHas('causer', function ($query) use ($search) {
                $query->search($search);
            })
            ->orWhereHas('subject', function ($query) use ($search) {
                $query->search($search);
            });
    }
}