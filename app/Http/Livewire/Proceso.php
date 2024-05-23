<?php

namespace App\Http\Livewire;

use App\Models\proceso as ModelsProceso;
use Livewire\Component;
use Livewire\WithPagination;


class Proceso extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $pro_prefijo, $pro_nombre;
    public $idx, $pro_prefijox, $pro_nombrex;
    public $search  = "";

    protected $listeners = ['render', 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getProcesoProperty()
    {
        if($this->search == ""){
            return ModelsProceso::orderBy('id','DESC')->paginate(5);
        } else {
            return ModelsProceso::
            orWhere('pro_prefijo', 'LIKE', '%'.$this->search.'%')
            ->orWhere('pro_nombre', 'LIKE', '%'.$this->search.'%')
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
            'pro_nombre' => 'required|string|max:60',
            'pro_prefijo' => 'required|string|max:20',
        ],[
            'pro_nombre.required' => 'El campo Nombre es obligatorio',
            'pro_nombre.string' => 'El campo Nombre recibe solo cadena de texto',
            'pro_nombre.max' => 'El campo Nombre debe contener maximo 50 caracteres',
            'pro_prefijo.required' => 'El campo Prefijo es obligatorio',
            'pro_prefijo.string' => 'El campo Prefijo recibe solo cadena de texto',
            'pro_prefijo.max' => 'El campo Prefijo debe contener maximo 25 caracteres',
        ]);
       
        $tipo = new ModelsProceso();
        $tipo->pro_prefijo = $this->pro_prefijo;
        $tipo->pro_nombre = $this->pro_nombre;
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
        $this->pro_prefijox =  $obj['pro_prefijo'];
        $this->pro_nombrex = $obj['pro_nombre'];
    }

     /**
     * Update
     *
     * Esta funcion recibe los datos del modal Editar, con el id  proporcionado se procede a busca en base de datos,
     * se modifica el dato solicitado y se procede a guardar la informacion  
     */
    public function actualizar()
    {
        $data = ModelsProceso::find($this->idx);
        $data->pro_prefijo = $this->pro_prefijox;
        $data->pro_nombre = $this->pro_nombrex;
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
        ModelsProceso::where('id',$post)->first()->delete();
    }

    /**
     * Render
     *
     * Esta funcion me renderiza ern tiempo real la informacion existente en base de datos y esto me ayuda a evitar estar recargando la pagina 
     */
    public function render()
    {
        return view('livewire.proceso')->extends('layouts.plantilla_back')->section('contenido');
    }
}
