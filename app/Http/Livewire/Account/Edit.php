<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $name, $username, $picture;
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->username = auth()->user()->username;
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'picture'   => $this->picture ? 'image|mimes:jpg,jpeg,png' : '',
            'username'  => 'required|min:3|max:25|unique:users,username,' . auth()->id(),
            'name'      => 'required|min:3|string',
        ]);
    }
    public function update()
    {
        try {
            if ($this->picture) {
                \Storage::delete(auth()->user()->picture);
                $picture = $this->picture->store('images/profile');
            } else {
                $picture = auth()->user()->picture ?? null;
            }
            auth()->user()->update([
                'name' => $this->name,
                'username' => $this->username,
                'picture' => $picture,
            ]);
            session()->flash('message', 'Data successfully updated.');
        } catch (\Throwable $th) {
            //throw $th
        }
    }
    public function render()
    {
        return view('livewire.account.edit');
    }
}
