@section('title', 'Documentos')
<div>
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-1">Documento</h1>
                <button class="btn btn-primary rounded-circle " data-bs-toggle="modal"
                    data-bs-target="#modalCrearTipoDoc">+</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered">
                        <thead>
                            <th colspan="7">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control"
                                    placeholder="Ingrese el Nombre o codigo"
                                    wire:model="search">
                                </div>
                            </th>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Contenido</th>
                                <th class="text-center">Tipo Doc</th>
                                <th class="text-center">Proceso</th>
                                <th class="text-center">Fecha de creacion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->documento as $c)
                                <tr>
                                    <td class="text-center">{{ $c->doc_nombre }}</td>
                                    <td class="text-center">{{ $c->doc_codigo }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" wire:click="cargarservicio({{$c}})" data-bs-toggle="modal" data-bs-target="#verObs"><i class="fab fa-sistrix"></i></button>
                                    </td>
                                    <td class="text-center">{{ $tipos::find($c->doc_id_tipo)->tip_prefijo}}</td>
                                    <td class="text-center">{{ $procesos::find($c->doc_id_proceso)->pro_prefijo}}</td>
                                    <td class="text-center">{{ $c->created_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="datacliente({{ $c }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$c->id}})"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No hay registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $this->documento->links() }}
                </div>
            </div>
        </div>

        {{-- Modal crear Cliente --}}
        <div class="modal fade" id="modalCrearTipoDoc" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Documento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label class="@error('doc_nombre') text-danger @enderror">Nombre</label>
                            <input type="text" class="form-control @error('doc_nombre') text-danger @enderror" wire:model="doc_nombre">
                            <i class="text-danger">
                                @error('doc_nombre') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group mb-2">
                            <label class="@error('doc_contenido') text-danger @enderror">Contenido</label>
                            <textarea class="form-control @error('doc_contenido') text-danger @enderror" wire:model="doc_contenido" rows="3"></textarea>
                            <i class="text-danger">
                                @error('doc_contenido') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group">
                            <label class="@error('doc_id_tipo') text-danger @enderror">Prefijo</label>
                            <select class="form-select @error('doc_id_tipo') text-danger @enderror" wire:model="doc_id_tipo">
                                <option value="">Seleccione una opción...</option>
                                @foreach ($tipo as $ti)
                                    <option value="{{$ti->id}}">{{ $ti->tip_prefijo }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">
                                @error('doc_id_tipo') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group">
                            <label class="@error('doc_id_proceso') text-danger @enderror">Proceso</label>
                            <select class="form-select @error('doc_id_proceso') text-danger @enderror" wire:model="doc_id_proceso">
                                <option value="">Seleccione una opción...</option>
                                @foreach ($proceso as $pr)
                                    <option value="{{$pr->id}}">{{ $pr->pro_prefijo }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">
                                @error('doc_id_proceso') {{ $message }} @enderror
                            </i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Documento</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal crear Cliente --}}

        {{--  modal descripcion   --}}
        <div class="modal fade" id="verObs" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Contenido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: justify" >{{$descripcion}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
        {{--  modal descripcion   --}}

        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Documento</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" wire:model="doc_nombrex">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Codigo</label>
                                        <input type="number" class="form-control" wire:model="doc_codigox">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Contenido</label>
                                        <textarea class="form-control @error('doc_contenido') text-danger @enderror" wire:model="doc_contenidox" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Prefijo</label>
                                        <select class="form-select" wire:model="doc_id_tipox">
                                            <option value="">Seleccione una opción...</option>
                                            @foreach ($tipo as $ti)
                                                <option value="{{$ti->id}}">{{ $ti->tip_prefijo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Proceso</label>
                                        <select class="form-select" wire:model="doc_id_procesox">
                                            <option value="">Seleccione una opción...</option>
                                            @foreach ($proceso as $pr)
                                                <option value="{{$pr->id}}">{{ $pr->pro_prefijo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actualizar">Editar
                                        Documento</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  editar   --}}
    </div>
     {{--  @dump(session('datos'))  --}}
     @if(session('datos'))
     <script>
         Swal.fire(
             '!Registrado!',
             'Se registro el Documento',
             'success'
         )
     </script>
     @elseif (session('datosact'))
         <script>
             Swal.fire(
                 '!Actualizado!',
                 'Se actualizo el Documento',
                 'success'
             )
         </script>
     @endif
     <script>
         livewire.on('deletePost', postId => {
             Swal.fire({
                 title: "¿Estas Seguro?",
                 text: "¿Desea Eliminar este registro?",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonColor: "#3085d6",
                 cancelButtonColor: "#d33",
                 confirmButtonText: "SI"
             }).then((result) => {
                 if (result.isConfirmed) {
                     livewire.emitTo('documento', 'delete', postId);
 
                     Swal.fire({
                     title: "!Eliminado!",
                     text: "Se elimino el Documento",
                     icon: "success"
                     });
                 }
             });
         });
     </script>
</div>
