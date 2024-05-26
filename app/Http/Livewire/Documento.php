<?php

namespace App\Http\Livewire;

use App\Models\documento as ModelsDocumento;
use App\Models\proceso;
use App\Models\tipo_doc;
use Livewire\Component;
use Livewire\WithPagination;


class Documento extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $doc_nombre, $doc_codigo, $doc_contenido, $doc_id_tipo, $doc_id_proceso;
    public $idx,$doc_nombrex, $doc_codigox, $doc_contenidox, $doc_id_tipox, $doc_id_procesox;
    public $search  = "", $tipo, $proceso, $tipos, $procesos;
    public $idy, $descripcion;

    protected $listeners = ['render', 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getDocumentoProperty()
    {
        if($this->search == ""){
            return ModelsDocumento::orderBy('id','DESC')->paginate(5);
        } else {
            return ModelsDocumento::
            orWhere('doc_nombre', 'LIKE', '%'.$this->search.'%')
            ->orWhere('doc_codigo', 'LIKE', '%'.$this->search.'%')
            ->paginate(3);
        } 
    }

    /**
     * Crear
     *
     * Esta funcion recibe los datos del modal Crear,luego de ser recibidos pasan or un proceso de validaciones esto quiere dedcir si la informacion
     * que esta en el validador se esta cumpliendo, luego se hace una consulta en base de datos de cual es el ultimo dato que esta en base de datos 
     * esto entra en una condicional si el dato esta nulo se procede a inicializar una variable en cero, sino esta nulo se procede a sumarle un numero a la variable un +1,
     * se hace una consulta en base ded atos de las dos tablas (la tabla procesos y la tabla tipo doc), el resultado arrojado se procede a concatenarse en la variable 
     * doc_codigo con la variable $c, se procede a insertar elk resto de informacion y luego se procede a ser guardada
     */
    public function crear()
    {
        $this->validate([
            'doc_nombre' => 'required|string|max:60',
            'doc_contenido' => 'required|string|max:100',
            'doc_id_tipo' => 'required|numeric',
            'doc_id_proceso' => 'required|numeric',

        ],[
            'doc_nombre.required' => 'El campo Nombre es obligatorio',
            'doc_nombre.string' => 'El campo Nombre recibe solo cadena de texto',
            'doc_nombre.max' => 'El campo Nombre debe contener maximo 50 caracteres',
            'doc_contenido.required' => 'El campo Contenido es obligatorio',
            'doc_contenido.string' => 'El campo Contenido recibe solo cadena de texto',
            'doc_contenido.max' => 'El campo Contenido debe contener maximo 100 caracteres',
            'doc_id_tipo.required' => 'El campo Tipo es obligatorio',
            'doc_id_tipo.string' => 'El campo Tipo recibe solo numeros enteros',
            'doc_id_proceso.required' => 'El campo Proceso es obligatorio',
            'doc_id_proceso.string' => 'El campo Proceso recibe solo numeros enteros',
        ]);
       

        $consecutivo = ModelsDocumento::orderBy('id', 'desc')->first();
        if($consecutivo == null){
            $c = "000";
        } else {
            $temp = explode('-' , $consecutivo->doc_codigo);
            $c = $temp[2]+1;
            $c = str_pad($c, 3, "0", STR_PAD_LEFT);
        }

        $tipo = new ModelsDocumento();
        $tipo->doc_nombre = $this->doc_nombre;
        $tip_doc =  tipo_doc::find($this->doc_id_tipo);
        $tip_pro = proceso::find($this->doc_id_proceso);
        $tipo->doc_codigo = $tip_doc->tip_prefijo. '-'. $tip_pro->pro_prefijo. '-'. $c;
        $tipo->doc_contenido = $this->doc_contenido;
        $tipo->doc_id_tipo = $this->doc_id_tipo;
        $tipo->doc_id_proceso = $this->doc_id_proceso;
        $tipo->save();
        $this->reset();
        $msj = ['!Registrado!', 'Se registro el Documento', 'success'];
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
        $this->doc_nombrex =  $obj['doc_nombre'];
        $this->doc_codigox = $obj['doc_codigo'];
        $this->doc_contenidox = $obj['doc_contenido'];
        $this->doc_id_tipox = $obj['doc_id_tipo'];
        $this->doc_id_procesox = $obj['doc_id_proceso'];
    }

    /**
     * datacliente
     *
     * Esta funcion recibe los datos que le manda el boton ver(El que tiene la lupa),  procede a guardar la informacion en variables diferentes y asi posteriormente poser 
     * ser mostrada en el front a traves del modal contenido 
     */
    public function cargarservicio($obj){

        $temp = ModelsDocumento::find($obj['id']);

        $this->idy = $temp->id;
        $this->descripcion = $temp->doc_contenido;
    }

    /**
     * Update
     *
     * Esta funcion recibe los datos del modal Editar, con el id  proporcionado se procede a busca en base de datos,
     * se modifica el dato solicitado y se procede a guardar la informacion  
     */
    public function actualizar()
    {
        $data = ModelsDocumento::find($this->idx);
        $data->doc_nombre = $this->doc_nombrex;
        $data->doc_codigo = $this->doc_codigox;
        $data->doc_contenido = $this->doc_contenidox;
        $data->doc_id_tipo = $this->doc_id_tipox;
        $data->doc_id_proceso = $this->doc_id_procesox;
        $data->save();
        $msj = ['!Actualizado!', 'Se actualizo el Documento', 'success'];
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
        ModelsDocumento::where('id',$post)->first()->delete();
    }

    /**
     * Render
     *
     * Esta funcion me renderiza ern tiempo real la informacion existente en base de datos y esto me ayuda a evitar estar recargando la pagina 
     */
    public function render()
    {
        $this->tipo =  tipo_doc::all();
        $this->tipos = tipo_doc::class;
        $this->proceso =  proceso::all();
        $this->procesos = proceso::class;

        return view('livewire.documento')->extends('layouts.plantilla_back')->section('contenido');
    }
}
