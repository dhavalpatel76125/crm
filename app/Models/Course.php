<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //table name
    protected $table = 'courses';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'hours',
        'minutes'
    ];
}
