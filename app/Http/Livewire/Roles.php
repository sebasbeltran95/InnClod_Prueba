<?php

namespace App\Http\Livewire;

use App\Models\rol;
use Livewire\Component;
use Livewire\WithPagination;


class Roles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $rol;
    public $idx, $rolx;
    public $search  = "";

    protected $listeners = ['render', 'delete'];

    public function getRolesProperty()
    {
        if($this->search == ""){
            return rol::orderBy('id','DESC')->paginate(5);
        } else {
            return rol::
            orWhere('rol', 'LIKE', '%'.$this->search.'%')
            ->paginate(3);
        }
    }




    public function render()
    {
        return view('livewire.roles')->extends('layouts.plantilla_back')->section('contenido');
    }
}
