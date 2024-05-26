<div>
    @section('title', 'Tipo_Doc')
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-1">Tipo Doc</h1>
                <button class="btn btn-primary rounded-circle " data-bs-toggle="modal"
                    data-bs-target="#modalCrearTipoDoc">+</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered">
                        <thead>
                            <th colspan="4">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control"
                                    placeholder="Ingrese el Nombre o prefijo"
                                    wire:model="search">
                                </div>
                            </th>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Prefijo</th>
                                <th class="text-center">Fecha de creacion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->tipo as $t)
                                <tr>
                                    <td class="text-center">{{ $t->tip_nombre }}</td>
                                    <td class="text-center">{{ $t->tip_prefijo }}</td>
                                    <td class="text-center">{{ $t->created_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="datacliente({{ $t }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$t->id}})"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No hay registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $this->tipo->links() }}
                </div>
            </div>
        </div>

        {{-- Modal crear Cliente --}}
        <div class="modal fade" id="modalCrearTipoDoc" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Tipo Doc</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label class="@error('tip_nombre') text-danger @enderror">Nombre</label>
                            <input type="text" class="form-control @error('tip_nombre') text-danger @enderror" wire:model="tip_nombre">
                            <i class="text-danger">
                                @error('tip_nombre') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group mb-2">
                            <label class="@error('tip_prefijo') text-danger @enderror">Prefijo</label>
                            <input type="text" class="form-control @error('tip_prefijo') text-danger @enderror" wire:model="tip_prefijo">
                            <i class="text-danger">
                                @error('tip_prefijo') {{ $message }} @enderror
                            </i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Tipo Doc</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal crear Cliente --}}
        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Tipo Doc</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">nombre</label>
                                        <input type="text" class="form-control"  wire:model="tip_nombrex">
                                    </div>
                                    <div class="form-group">
                                        <label>Prefijo</label>
                                        <select class="form-select" wire:model="tip_prefijox">
                                            <option value="">Seleccione una opción...</option>
                                            <option value="CC">CC</option>
                                            <option value="CE">CE</option>
                                            <option value="NIT">NIT</option>
                                            <option value="TI">TI</option>
                                            <option value="PASAPORTE">PASAPORTE</option>
                                            <option value="RC">RC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actualizar">Editar
                                        Tipo Doc</button>
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
             'Se registro el Tipo Doc',
             'success'
         )
     </script>
     @elseif (session('datosact'))
         <script>
             Swal.fire(
                 '!Actualizado!',
                 'Se actualizo el Tipo Doc',
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
                     livewire.emitTo('tipo-doc', 'delete', postId);
 
                     Swal.fire({
                     title: "!Eliminado!",
                     text: "Se elimino el Tipo Doc",
                     icon: "success"
                     });
                 }
             });
         });
     </script>
</div>
