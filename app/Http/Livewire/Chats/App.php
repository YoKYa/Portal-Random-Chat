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
    public $user_list = [];
    // protected $listeners = [
    //     'load_chats' => 'loadChats',
    //     'load_chat' => 'loadChat',
    // ];
    public function mount()
    {
        $ids = Auth::user()->gchats()->pluck('id');
        $ids->push(auth()->id());
        $chats = Chats::WhereIn('gchat_id',$ids)->latest()->get()->groupBy('gchat_id');
        foreach ($chats as $key => $value) {
            $this->chats_list[$key] = $value->first()->gchats()->first();
        }

        foreach ($this->chats_list as $key => $chat_list) {
            foreach ($chat_list->user as $key2 => $user) {
                if ($user->id != Auth::user()->id) {
                    $this->user_list[$key] = $user;        
                }
            }
        }
        
    }
    public function render()
    {
        return view('livewire.chats.app');
    }
}
