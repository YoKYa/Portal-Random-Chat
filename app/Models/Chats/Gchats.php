<?php

namespace App\Models\Chats;

use App\Models\User;
use App\Models\Chats\Chats;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gchats extends Model
{
    use HasFactory;
    protected $fillable = ['code','type'];
    public function user()
    {
        return $this->belongsToMany(User::class,'user_chat','gchat_id','user_id');
    }
    public function chats()
    {
        return $this->hasMany(Chats::class);
    }
}
