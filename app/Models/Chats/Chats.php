<?php

namespace App\Models\Chats;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    protected $fillable = ['gchat_id', 'user_id', 'body'];
    use HasFactory;
    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gchats()
    {
        return $this->belongsTo(Gchats::class,'gchat_id');
    }
}
