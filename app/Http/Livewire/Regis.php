<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Regis extends Component
{
    public function render()
    {
        return view('livewire.regis')->extends('layouts.plantilla_back')->section('contenido');
    }
}
