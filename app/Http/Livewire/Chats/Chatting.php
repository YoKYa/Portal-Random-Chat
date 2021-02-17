<?php

namespace App\Http\Livewire\Chats;

use Livewire\Component;

use App\Models\Chats\Chats as Chat;
use App\Models\Chats\Gchats;
use Illuminate\Support\Facades\Auth;

class Chatting extends Component
{
    public $namechat, $usernamechat, $gravatar;
    public $chatBody;
    public $gchatId;
    public $list;
    protected $listeners = ['chat'];
    
    public function m()
    {
        $this->emit('m');
    }
    public function chat($chatId)
    {
        $this->gchatId = $chatId;
        $chat = Chat::where('gchat_id', '=', $chatId)->orderBy('updated_at', 'DESC')->get();
        $chat2 = Chat::where('gchat_id', '=', $chatId)->orderBy('updated_at', 'ASC')->get();
        $this->list = $chat;
        for ($i = 0; $i  < 2; $i++) {
            if (Auth::user()->id != $chat2[$i]->user->id) {
                $this->namechat = $chat2[$i]->user->name;
                $this->usernamechat = $chat2[$i]->user->username;
                $this->gravatar = $chat2[$i]->user->gravatar();
            }
        }
    }
    public function hydrate()
    {
        if (!empty($this->gchatId)) {
            $chat = Chat::where('gchat_id', '=', $this->gchatId)->orderBy('updated_at', 'DESC')->get();
            $this->list = $chat;
            for ($i = 0; $i < 2; $i++) {
                if (Auth::user()->id != $chat[$i]->user->id) {
                    $this->namechat = $chat[$i]->user->name;
                    $this->usernamechat = $chat[$i]->user->username;
                    $this->gravatar = $chat[$i]->user->gravatar();
                }
            }
        }
    }
    public function send()
    {
        try {
            Chat::create([
                'gchat_id'      => $this->gchatId,
                'user_id'       => Auth::user()->id,
                'body'          => $this->chatBody,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
            Gchats::find($this->gchatId)->update([
                'updated_at' => now(),
            ]);
            $this->chatBody ="";
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete()
    {
        Chat::where('gchat_id','=',$this->gchatId)->delete();
        Gchats::find($this->gchatId)->delete();
        $this->gchatId = null;
        $this->namechat = null;
        $this->usernamechat = null;
        $this->gravatar = null;
    }
    public function render()
    {
        return view('livewire.chats.chatting');
    }
}
