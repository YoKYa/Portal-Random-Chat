<?php

namespace App\Models;

use App\Models\Chats\Chats;
use App\Models\Chats\Gchats;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'hash',
        'picture',
        'on_random'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gravatar($size = 150)
    {
        return $this->picture ? "/storage/{$this->picture}" : "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=&s=" . $size;
    }
    public function addGchat(User $user = null, Gchats $gchats = null)
    {
        if ($gchats ==  null) {
            $gchats = Gchats::create();
        }
        if ($user !=  null) {
            $user->gchats()->save($gchats);
            $user->chats()->create([
                'gchat_id' => $gchats->id,
                'user_id' => $user->id,
                'body' => "bAdmin",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $this->gchats()->save($gchats);
        $this->chats()->create([
            'gchat_id' => $gchats->id,
            'user_id' => $this->id,
            'body' => "bAdmin",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return true;
    }
    public function delGchat(Gchats $gchats)
    {
        return $this->gchats()->detach($gchats);
    }
    public function gchats()
    {
        return $this->belongsToMany(Gchats::class, 'user_chat', 'user_id', 'gchat_id')->withTimestamps();
    }
    public function chats()
    {
        return $this->hasMany(Chats::class);
    }
}
