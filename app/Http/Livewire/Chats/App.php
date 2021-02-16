<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;
use App\Models\Chats\Chats;
use App\Models\Chats\Gchats;
use Illuminate\Support\Facades\Auth;

class App extends Component
{
    public $on_random;

    public function updated($field)
    {
        if ($field == "on_random") {
            Auth::user()->update([
                'on_random' => $this->on_random
            ]);
        }
    }
    public function hydrate()
    {
        $this->on_random = Auth::user()->on_random;
    }
    public function render()
    {
        return view('livewire.chats.app');
    }
}
