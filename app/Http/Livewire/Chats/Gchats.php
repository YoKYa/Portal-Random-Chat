<?php

namespace App\Http\Livewire\Chats;

use Livewire\Component;

class Gchats extends Component
{
    public $chat_list;
    public function mount($chat_list)
    {
        $this->chat_list = $chat_list;
    }
    public function render()
    {
        return view('livewire.chats.gchats');
    }
}
