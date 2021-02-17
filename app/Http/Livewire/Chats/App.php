<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class App extends Component
{
    public $on_random;
    public $h1 = "";
    public $h2 = "hidden sm:hidden";
    protected $listeners = [
        'm',
    ];
    public function m()
    {
        $temp = $this->h1;
        $this->h1 = $this->h2;
        $this->h2 = $temp;
    }
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
