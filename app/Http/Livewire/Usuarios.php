<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    public function getUsuariosProperty()
    {
        if($this->search == ""){
            return User::orderBy('id','DESC')->paginate(5);
        } else {
            return User::
            orWhere('pro_prefijo', 'LIKE', '%'.$this->search.'%')
            ->orWhere('pro_nombre', 'LIKE', '%'.$this->search.'%')
            ->paginate(3);
        }
    }


    public function crear()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'rol' => 'required|numeric',
        ],[
            'name.required' => 'El campo Nombre es obligatorio',
            'name.string' => 'El campo Nombre recibe solo cadena de texto',
            'email.required' => 'El campo Email es obligatorio',
            'email.string' => 'El campo Email recibe solo cadena de texto',
            'email.email' => 'El campo Email le falta el @',
            'password.required' => 'El campo Password es obligatorio',
            'password.string' => 'El campo Password recibe solo cadena de texto',
            'rol.required' => 'El campo Rol es obligatorio',
            'rol.numeric' => 'El campo Rol recibe solo numeros enteros',
        ]);

        $email = User::Where('email', $this->email)->first();
        if($email == null){
            $user = new User();
            $user->name =  $this->name;
            $user->email =  $this->email;
            $user->password = Hash::make($this->password);
            $user->rol = $this->rol;
            $user->save();
            $this->reset();
            session()->flash('datos','ok');
        } else {
            session()->flash('datoscorreo','ok');
        }
    }


    public function render()
    {
        return view('livewire.usuarios')->extends('layouts.plantilla_back')->section('contenido');
    }
}
