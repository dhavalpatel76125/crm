<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTransaction extends Model
{

    protected $table = 'temp_transactions';
    protected $fillable = [
        'user_id', 'money', 'received_date'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
