<?php

namespace App\Http\Livewire\Chats;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $gchats;
    public function getGchat($id)
    {
        dd($id);
    }
    public function hydrate()
    {
        $this->gchats = Auth::user()->gchats()->orderBy('updated_at', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.chats.chat');
    }
}
