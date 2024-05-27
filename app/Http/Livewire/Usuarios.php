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
    public $idy, $idx, $namex, $emailx,$passwordx,$rolx;
    public $search  = "";

    protected $listeners = ['render', 'delete'];

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
            'rol' => 'required',
        ],[
            'name.required' => 'El campo Nombre es obligatorio',
            'name.string' => 'El campo Nombre recibe solo cadena de texto',
            'email.required' => 'El campo Email es obligatorio',
            'email.string' => 'El campo Email recibe solo cadena de texto',
            'email.email' => 'El campo Email le falta el @',
            'password.required' => 'El campo Password es obligatorio',
            'password.string' => 'El campo Password recibe solo cadena de texto',
            'rol.required' => 'El campo Rol es obligatorio',
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
            $msj = ['!Registrado!', 'Se registro el Usuario', 'success'];
            $this->emit('ok', $msj);
        } else {
            $msj = ['!Advertencia!', 'El correo ya existe', 'warning'];
            $this->emit('ok', $msj);
        }
    }

    public function cargausuario($obj)
    {
        $this->idx =  $obj['id'];
        $this->namex =  $obj['name'];
        $this->emailx =  $obj['email'];
        $this->rolx = $obj['rol'];
    }
    public function actua()
    {
        $data = User::find($this->idx);
        $data->name = $this->namex;
        $data->email = $this->emailx;
        $data->rol = $this->rolx;

        $data->save();
        $msj = ['!Actualizado!', 'Se actualizo el Usuario', 'success'];
        $this->emit('ok', $msj);

    }
    public function cargacredenciales($obj)
    {
        $this->idy = $obj;
    }
    public function actuacredenciales($idu)
    {
        $data = User::find($idu);
        if($this->passwordy != null){
            $data->password = Hash::make($this->passwordy);
            $data->save();
        }
        $this->reset();
        session()->flash('datoscredenciales','ok');
    }
    
     /**
     * Render
     *
     * Esta funcion me renderiza ern tiempo real la informacion existente en base de datos y esto me ayuda a evitar estar recargando la pagina 
     */
    public function render()
    {
        return view('livewire.usuarios')->extends('layouts.plantilla_back')->section('contenido');
    }
}
