<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'event_type',
        'route_name',
        'url',
        'page_slug',
        'project_id',
        'event_data',
    ];

    protected function casts(): array
    {
        return ['event_data' => 'array'];
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
