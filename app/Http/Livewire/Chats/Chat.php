<?php

namespace App\Http\Livewire\Chats;

use App\Models\Chats\Chats;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $gchats;
    public $select;
    public function getGchat($id)
    {
        $this->select = $id;
        $this->emit('chat', $id);
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
