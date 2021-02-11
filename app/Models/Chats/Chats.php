<?php

namespace App\Models\Chats;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gchats()
    {
        return $this->belongsTo(Gchats::class);
    }
}
