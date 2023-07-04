<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;

class GoBack extends Component
{
    public function goBack()
    {
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.buttons.go-back');
    }
}
