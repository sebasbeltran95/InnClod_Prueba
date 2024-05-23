<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;


class Usuarios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $email,$password,$rol;
    public $idx, $namex, $emailx,$passwordx,$rolx;
    public $search  = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.usuarios')->extends('layouts.plantilla_back')->section('contenido');
    }
}
