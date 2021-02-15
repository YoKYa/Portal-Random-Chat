<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;
use App\Models\Chats\Chats;
use App\Models\Chats\Gchats;
use Illuminate\Support\Facades\Auth;

class App extends Component
{
    public $chats_list = [];
    protected $listeners = [
        'load_chats' => 'loadChats',
        'load_chat' => 'loadChat',
    ];
    public function mount()
    {
        $list_gchats = Chats::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()->groupBy('gchat_id');
        foreach ($list_gchats as $key => $value) {
            $this->chats_list[$key] = $value->first()->gchats()->first();
        }
    }

    public function loadChats()
    {
        $list_gchats = Chats::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()->groupBy('gchat_id');
        foreach ($list_gchats as $key => $value) {
            $this->chats_list[$key] = $value->first()->gchats()->first();
        }
    }
    public function render()
    {
        return view('livewire.chats.app');
    }
}
