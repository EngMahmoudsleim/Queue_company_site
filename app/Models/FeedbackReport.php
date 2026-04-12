<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'type',
        'subject',
        'message',
        'current_url',
        'priority',
        'screenshot_path',
        'status',
        'admin_note',
    ];
}
