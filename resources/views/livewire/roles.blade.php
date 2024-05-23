@section('title', 'Roles')
<div>
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-1">Roles</h1>
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
                                <th class="text-center">Fecha de creacion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->roles as $p)
                                <tr>
                                    <td class="text-center">{{ $p->rol }}</td>
                                    <td class="text-center">{{ $p->created_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="datacliente({{ $p }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$p->id}})"><i
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
                    {{ $this->roles->links() }}
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
                        <div class="form-group">
                            <label>Rol</label>
                            <select class="form-select" wire:model="rol">
                                <option value="">Seleccione una opción...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Cliente">Cliente</option>
                            </select>
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
                                    <h4 class="modal-title">Editar Prceso</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Prefijo</label>
                                        <input type="text" class="form-control"  wire:model="pro_prefijox">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Nombre</label>
                                        <input type="text" class="form-control"  wire:model="pro_nombrex">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actualizar">Editar
                                        proceso</button>
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
             'Se registro el Proceso',
             'success'
         )
     </script>
     @elseif (session('datosact'))
         <script>
             Swal.fire(
                 '!Actualizado!',
                 'Se actualizo el Proceso',
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
                     livewire.emitTo('proceso', 'delete', postId);
 
                     Swal.fire({
                     title: "!Eliminado!",
                     text: "Se elimino el Proceso",
                     icon: "success"
                     });
                 }
             });
         });
     </script>
</div>
