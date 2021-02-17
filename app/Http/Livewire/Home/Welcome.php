<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Welcome extends Component
{
    public $code;
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required||min:1',
        ]);
    }
    public function join_username()
    {
        $user = User::where('username', '=', $this->code)->first();
        if ($user != null) {
            if ($user->id != auth()->id()) {
                Auth::user()->addGchat($user);
                session()->flash('message', 'User added to chat.');
                $this->code = "";
            } else {
                session()->flash('error', 'Please dont use your username.');
            }
        } else {
            session()->flash('error', 'Please use correct username.');
        }
    }
    public function render()
    {
        return view('livewire.home.welcome');
    }
}
