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

    public function updatingSearch()
    {
        $this->resetPage();
    }

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

    /**
     * Crear
     *
     * Esta funcion recibe los datos del modal Crear,luego de ser recibidos pasan or un proceso de validaciones esto quiere dedcir si la informacion
     * que esta en el validador se esta cumpliendo, despues  pasan a ser creeados y posteriormente a ser guardados 
     * */
    public function crear()
    {
        $this->validate([
            'rol' => 'required|string|max:60',
        ],[
            'rol.required' => 'El campo Rol es obligatorio',
            'rol.string' => 'El campo Rol recibe solo cadena de texto',
            'rol.max' => 'El campo Rol debe contener maximo 50 caracteres',
        ]);
       
        $tipo = new rol();
        $tipo->rol = $this->rol;
        $tipo->save();
        $this->reset();
        session()->flash('datos','ok');
    }

    /**
     * datacliente
     *
     * Esta funcion recibe los datos que le manda el boton Editar,  procede a guardar la informacion en variables diferentes y asi posteriormente poser 
     * ser mostrada en el front a traves del modal editar 
     */
    public function datacliente($obj)
    {
        $this->idx = $obj['id'];
        $this->rolx =  $obj['rol'];
    }

    /**
     * Update
     *
     * Esta funcion recibe los datos del modal Editar, con el id  proporcionado se procede a busca en base de datos,
     * se modifica el dato solicitado y se procede a guardar la informacion  
     */
    public function actualizar()
    {
        $data = rol::find($this->idx);
        $data->rol = $this->rolx;
        $data->save();
        session()->flash('datosact','ok');
    }

    /**
     * Delete
     *
     * Esta funcion recibe el id que manda el front, luego de ser recibido 
     * se procede a eliminar el dato
     */
    public function delete($post)
    {
        rol::where('id',$post)->first()->delete();
    }

     /**
     * Render
     *
     * Esta funcion me renderiza ern tiempo real la informacion existente en base de datos y esto me ayuda a evitar estar recargando la pagina 
     */
    public function render()
    {
        return view('livewire.roles')->extends('layouts.plantilla_back')->section('contenido');
    }
}
