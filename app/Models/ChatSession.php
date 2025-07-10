<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'visitor_name',
        'visitor_email',
        'session_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function latestMessage()
    {
        return $this->hasOne(ChatMessage::class)->latest();
    }

    public function unreadMessages()
    {
        return $this->hasMany(ChatMessage::class)->where('is_read', false);
    }

    public function getDisplayNameAttribute()
    {
        return $this->user ? $this->user->name : $this->visitor_name;
    }

    public function getDisplayEmailAttribute()
    {
        return $this->user ? $this->user->email : $this->visitor_email;
    }
}
