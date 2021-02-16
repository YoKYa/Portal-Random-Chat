<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Generate extends Component
{
    public function generate()
    {
        $user = User::where('on_random', '=', true)->get();
        if ($user->first() == null) {
            session()->flash('message_error', 'Generate Fail (Not Found).');
        } else {
            $user = $user->pluck('id');
            $a = false;
            $number = 0;
            do {
                $random = collect($user)->random();
                if (auth::user()->id == $random) {
                    $a = true;
                    $number++;
                    if ($number >= 3) {
                        $a = false;
                        session()->flash('message_error', 'Generate Fail (Not Found).');
                    }
                } else {
                    $user = User::find($random);
                    Auth::user()->addGchat($user);
                    $user->update([
                        'on_random' => false
                    ]);
                    $a = false;
                    $this->add = false;
                    session()->flash('message', 'Generated.');
                    $this->emit('generated');
                }
            } while ($a);
        }
    }
    public function hydrate()
    {
        $this->on_random = Auth::user()->on_random;
    }
    public function render()
    {
        return view('livewire.chats.generate');
    }
}
