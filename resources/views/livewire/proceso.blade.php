<div>
    @section('title', 'Proceso')
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-1">proceso</h1>
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
                                <th class="text-center">Prefijo</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Fecha de creacion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->proceso as $p)
                                <tr>
                                    <td class="text-center">{{ $p->pro_prefijo }}</td>
                                    <td class="text-center">{{ $p->pro_nombre }}</td>
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
                    {{ $this->proceso->links() }}
                </div>
            </div>
        </div>

        {{-- Modal crear Cliente --}}
        <div class="modal fade" id="modalCrearTipoDoc" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Proceso</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label class="@error('pro_prefijo') text-danger @enderror">Prefijo</label>
                            <input type="text" class="form-control @error('pro_prefijo') text-danger @enderror" wire:model="pro_prefijo">
                            <i class="text-danger">
                                @error('pro_prefijo') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group mb-2">
                            <label class="@error('pro_nombre') text-danger @enderror">Nombre</label>
                            <input type="text" class="form-control @error('pro_nombre') text-danger @enderror" wire:model="pro_nombre">
                            <i class="text-danger">
                                @error('pro_nombre') {{ $message }} @enderror
                            </i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Proceso</button>
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
                                        Proceso</button>
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
</div>
@push('js')
    <script>
        Livewire.on('ok', msj =>{
            Swal.fire(
                msj[0],
                msj[1],
                msj[2],
            )
        });
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
@endpush