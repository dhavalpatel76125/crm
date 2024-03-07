<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    protected $table = 'kyc';

    protected $fillable = [
        'user_id',
        'title',
        'document_type',
        'image',
        'expiry_date',
        'status', // pending, approved, rejected  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //image path
    public function getImagePathAttribute()
    {
        return asset('images/' . $this->image);
    }
}
