<?php

namespace App\Http\Livewire;

use App\Models\tipo_doc;
use Livewire\Component;
use Livewire\WithPagination;


class TipoDoc extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $tip_nombre, $tip_prefijo;
    public $idx,$tip_nombrex, $tip_prefijox;
    public $search  = "";

    protected $listeners = ['render', 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getTipoProperty()
    {
        if($this->search == ""){
            return tipo_doc::orderBy('id','DESC')->paginate(5);
        } else {
            return tipo_doc::
            orWhere('tip_nombre', 'LIKE', '%'.$this->search.'%')
            ->orWhere('tip_prefijo', 'LIKE', '%'.$this->search.'%')
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
            'tip_nombre' => 'required|string|max:60',
            'tip_prefijo' => 'required|string|max:20',
        ],[
            'tip_nombre.required' => 'El campo Nombre es obligatorio',
            'tip_nombre.string' => 'El campo Nombre recibe solo cadena de texto',
            'tip_nombre.max' => 'El campo Nombre debe contener maximo 50 caracteres',
            'tip_prefijo.required' => 'El campo Prefijo es obligatorio',
            'tip_prefijo.string' => 'El campo Prefijo recibe solo cadena de texto',
            'tip_prefijo.max' => 'El campo Prefijo debe contener maximo 25 caracteres',
        ]);
       
        $tipo = new tipo_doc();
        $tipo->tip_nombre = $this->tip_nombre;
        $tipo->tip_prefijo = $this->tip_prefijo;
        $tipo->save();
        $this->reset();
        $msj = ['!Registrado!', 'Se registro el Tipo Doc', 'success'];
        $this->emit('ok', $msj);
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
        $this->tip_nombrex =  $obj['tip_nombre'];
        $this->tip_prefijox = $obj['tip_prefijo'];
    }

     /**
     * Update
     *
     * Esta funcion recibe los datos del modal Editar, con el id  proporcionado se procede a busca en base de datos,
     * se modifica el dato solicitado y se procede a guardar la informacion  
     */
    public function actualizar()
    {
        $data = tipo_doc::find($this->idx);
        $data->tip_nombre = $this->tip_nombrex;
        $data->tip_prefijo = $this->tip_prefijox;
        $data->save();
        $msj = ['!Actualizado!', 'Se actualizo el Tipo Doc', 'success'];
        $this->emit('ok', $msj);
    }

     /**
     * Delete
     *
     * Esta funcion recibe el id que manda el front, luego de ser recibido 
     * se procede a eliminar el dato
     */
    public function delete($post)
    {
        tipo_doc::where('id',$post)->first()->delete();
    }

     /**
     * Render
     *
     * Esta funcion me renderiza ern tiempo real la informacion existente en base de datos y esto me ayuda a evitar estar recargando la pagina 
     */
    public function render()
    {
        return view('livewire.tipo-doc')->extends('layouts.plantilla_back')->section('contenido');
    }
}
