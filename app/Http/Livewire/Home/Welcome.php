<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Welcome extends Component
{
    public $code;
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required||min:5',       
        ]);
    }
    public function join()
    {

    }
    public function render()
    {
        return view('livewire.home.welcome');
    }
}
