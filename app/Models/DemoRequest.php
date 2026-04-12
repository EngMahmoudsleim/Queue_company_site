<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'email',
        'whatsapp',
        'preferred_channel',
        'message',
        'status',
        'admin_note',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
