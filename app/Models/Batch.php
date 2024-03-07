<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_name',
        'batch_description',
        'date',
        'time',
        'location',
        'duration_hours',
        'duration_minutes',
    ];
}
