<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Roles extends Component
{
    public function render()
    {
        return view('livewire.roles')->extends('layouts.plantilla_back')->section('contenido');
    }
}
