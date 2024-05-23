@section('title', 'Usuarios')
<div>
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-1">Usuarios</h1>
                <button class="btn btn-primary rounded-circle " data-bs-toggle="modal"
                    data-bs-target="#modalCrearUsuarios">+</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre Completo</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">rol</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->usuarios as $usu)
                                <tr>
                                    <td class="text-center">{{ $usu->name }}</td>
                                    <td class="text-center">{{ $usu->email }}</td>
                                    {{--  <td class="text-center">{{ $roll::find($usu->rol)->rol }}</td>  --}}
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-success"
                                                wire:click="cargacredenciales({{ $usu->id }})"
                                                data-bs-toggle="modal" data-bs-target="#Modalcontraseña"><i
                                                    class="fas fa-lock"></i></button>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="cargausuario({{ $usu }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$usu->id}})"><i
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
                    {{ $this->usuarios->links() }}
                </div>
            </div>
        </div>
        {{-- Modal crear Servicio --}}
        <div class="modal fade" id="modalCrearUsuarios" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Usuarios</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="{{ $errors->has('tipo_documento') ? ' text-danger': '' }}">Tipo de Documento</label>
                            <select class="form-select {{ $errors->has('tipo_documento') ? ' is-invalid': '' }}" wire:model="tipo_documento">
                                <option value="">Seleccione una opción...</option>
                                <option value="Carnet Diplomatico">Carnet Diplomatico</option>
                                <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                                <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Registro Civil">Registro Civil</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('tipo_documento') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('no_documento') ? ' text-danger': '' }}">No Documento</label>
                            <input type="text" class="form-control {{ $errors->has('no_documento') ? ' is-invalid': '' }}" wire:model="no_documento" placeholder="Ingrese No de documento o NIT">
                            <div class="invalid-feedback">
                                {{ $errors->first('no_documento') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('nombre_completo') ? ' text-danger': '' }}">Nombre Completo</label>
                            <input type="text" class="form-control {{ $errors->has('nombre_completo') ? ' is-invalid': '' }}" wire:model="nombre_completo" placeholder="Nombre completo">
                            <div class="invalid-feedback">
                                {{ $errors->first('nombre_completo') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('telefono') ? ' text-danger': '' }}">Telefono</label>
                            <input type="number" class="form-control {{ $errors->has('telefono') ? ' is-invalid': '' }}" wire:model="telefono" placeholder="Ingrese numero de telefono">
                            <div class="invalid-feedback">
                                {{ $errors->first('telefono') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('whatsapp') ? ' text-danger': '' }}">Whatsapp</label>
                            <input type="number" class="form-control {{ $errors->has('whatsapp') ? ' is-invalid': '' }}" wire:model="whatsapp" placeholder="Ingrese numero de telefono">
                            <div class="invalid-feedback">
                                {{ $errors->first('whatsapp') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('empresa') ? ' text-danger': '' }}">Empresa</label>
                            <input type="text" class="form-control {{ $errors->has('empresa') ? ' is-invalid': '' }}" wire:model="empresa" placeholder="Ingrese Nombre de la empresa">
                            <div class="invalid-feedback">
                                {{ $errors->first('empresa') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Web Empresa</label>
                            <input type="text" class="form-control" wire:model="web_empresa" placeholder="Ingrese pagina web de la empresa">
                        </div>
                        <div class="form-group">
                            <label class="{{ $errors->has('direccion') ? ' text-danger': '' }}">Direccion</label>
                            <input type="text" class="form-control {{ $errors->has('direccion') ? ' is-invalid': '' }}" wire:model="direccion" placeholder="Ingrese Direccion de la empresa">
                            <div class="invalid-feedback">
                                {{ $errors->first('direccion') }}
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="{{ $errors->has('email') ? ' text-danger': '' }}">Correo</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid': '' }}" wire:model="email"
                                placeholder="Ingrese Correo Electronico">
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="{{ $errors->has('password') ? ' text-danger': '' }}">Contraseña</label>
                            <input type="number" class="form-control {{ $errors->has('password') ? ' is-invalid': '' }}" wire:model="password"
                                placeholder="Ingrese una contraseña alfanumerica">
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="{{ $errors->has('rol') ? ' text-danger': '' }}">Rol</label>
                            <select class="form-select {{ $errors->has('rol') ? ' is-invalid': '' }}" wire:model="rol">
                                <option value="">Seleccione una opción...</option>
                                {{--  @foreach ($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->rol }}</option>
                                @endforeach  --}}
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('rol') }}
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="{{ $errors->has('descripcion') ? ' text-danger': '' }}">Servicio</label>
                            <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid': '' }}" wire:model="descripcion" rows="3"></textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('descripcion') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook (agregar link opcional)</label>
                            <input type="text" class="form-control" wire:model="facebook" placeholder="Ingrese link de facebook">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram (agregar link opcional)</label>
                            <input type="text" class="form-control" wire:model="instagram" placeholder="Ingrese link de instagram">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Usuarios</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal crear Servicio --}}

        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Servicio</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="valor_smmlv">Tipo de Documento</label>
                                        <select class="form-select" wire:model="tipo_documentox">
                                            <option value="">Seleccione una opción...</option>
                                            <option value="Carnet Diplomatico">Carnet Diplomatico</option>
                                            <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                                            <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                                            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="Registro Civil">Registro Civil</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Documento</label>
                                        <input type="text" class="form-control" wire:model="no_documentox" placeholder="Ingrese No de documento o NIT">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre Completo</label>
                                        <input type="text" class="form-control" wire:model="nombre_completox" placeholder="Nombre completo">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefono</label>
                                        <input type="number" class="form-control" wire:model="telefonox" placeholder="Ingrese numero de telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Whatsapp</label>
                                        <input type="number" class="form-control" wire:model="whatsappx" placeholder="Ingrese numero de telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Empresa</label>
                                        <input type="text" class="form-control" wire:model="empresax" placeholder="Ingrese Nombre de la empresa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Web Empresa</label>
                                        <input type="text" class="form-control" wire:model="web_empresax" placeholder="Ingrese pagina web de la empresa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Direccion</label>
                                        <input type="text" class="form-control" wire:model="direccionx" placeholder="Ingrese Direccion de la empresa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" wire:model="emailx">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="rolx">Rol</label>
                                        <select class="form-select" wire:model="rolx">
                                            {{--  @foreach ($roles as $r)
                                                <option value="{{ $r->id }}">{{ $r->rol }}</option>
                                            @endforeach  --}}
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" wire:model="fotox">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail1">Servicio</label>
                                        <textarea class="form-control" wire:model="descripcionx" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook (agregar link opcional)</label>
                                        <input type="text" class="form-control" wire:model="facebookx" placeholder="Ingrese link de facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Instagram (agregar link opcional)</label>
                                        <input type="text" class="form-control" wire:model="instagramx" placeholder="Ingrese link de instagram">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actua">Editar
                                        Servicio</button>
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

        {{--  modal descripcion   --}}
        {{--  <div class="modal fade" id="verObs" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Servicios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: justify" >{{$descripciony}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>   --}}
        {{--  modal descripcion   --}}

        {{--  contraseña   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modalcontraseña" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Contraseña</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        <input type="text" class="form-control" wire:model="passwordy">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{--  <button type="submit" class="btn btn-primary" wire:click="actuacredenciales({{ $usu->id }})">Editar Contraseña</button>  --}}
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  contraseña   --}}
    </div>
        {{--  @dump(session('datos'))  --}}
    @if(session('datos'))
    <script>
        Swal.fire(
            '!Registrado!',
            'Se registro el Cliente',
            'success'
        )
    </script>
    @elseif (session('datosact'))
        <script>
            Swal.fire(
                '!Actualizado!',
                'Se actualizo el Cliente',
                'success'
            )
        </script>
    @elseif (session('datoscorreo'))
        <script>
            Swal.fire({
                title: "El correo ya existe",
                icon: 'warning',
            })
        </script>
    @elseif (session('datoscredenciales'))
    <script>
        Swal.fire(
            '!Actualizado!',
            'Se actualizaron las credenciales',
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
                    livewire.emitTo('usuarios', 'delete', postId);

                    Swal.fire({
                    title: "!Eliminado!",
                    text: "Se elimino el Cliente",
                    icon: "success"
                    });
                }
            });
        });
    </script>
</div>
