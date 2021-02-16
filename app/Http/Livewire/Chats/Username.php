<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Username extends Component
{
    public $username;
    public function join_username()
    {
        $user = User::where('username', '=', $this->username)->first();
        if ($user != null) {
            if ($user->id != auth()->id()) {
                Auth::user()->addGchat($user);
                session()->flash('message', 'User added to chat.');
                $this->username = "";
            } else {
                session()->flash('message_error', 'Please dont use your username.');
            }
        }else {
            session()->flash('message_error', 'Please use correct username.');
        }
    }
    public function render()
    {
        return view('livewire.chats.username');
    }
}
