<?php

namespace App\Models;

use App\Models\Chats\Chats;
use App\Models\Chats\Gchats;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'hash',
        'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gravatar($size = 150)
    {
        return $this->picture ? "/storage/{$this->picture}" : "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=&s=" . $size;
    }
    public function gchats()
    {
        return $this->belongsToMany(Gchats::class,'user_chat','user_id','gchat_id');
    }
    public function chats()
    {
        return $this->hasMany(Chats::class);
    }
}
