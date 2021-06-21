<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Details extends Component
{
    public function render()
    {
        return view('livewire.details')->layout('layouts.template');;
    }
}