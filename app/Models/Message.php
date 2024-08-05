<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'is_read'
    ];

    // Relationship with User model for the sender
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relationship with User model for the receiver
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
