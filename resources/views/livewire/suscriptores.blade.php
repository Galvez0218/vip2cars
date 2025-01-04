<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">GESTION DE SUSCRIPTORES</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input wire:model.lazy="nombres" type="text"
                                class="form-control @error('nombres') is-invalid @enderror">
                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos">apellidosd</label>
                            <input wire:model.lazy="apellidos" type="text"
                                class="form-control @error('apellidos') is-invalid @enderror" />
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_evento">eventos</label>
                                <select wire:model.lazy="id_evento" class="form-control">
                                    <option value="default">-- Todos --</option>
                                    @foreach ($eventos as $evento)
                                        <option value="{{ $evento->id_evento }}">{{ $evento->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="celular">celular</label>
                            <input wire:model.lazy="celular" type="text"
                                class="form-control @error('celular') is-invalid @enderror" />
                            @error('celular')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id_evento">genero</label>
                                <select wire:model.lazy="genero" class="form-control">
                                    <option value="default">-- Todos --</option>
                                    <option value='M'>masculino</option>
                                    <option value='F'>femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="correo">correo</label>
                            <input wire:model.lazy="correo" type="text"
                                class="form-control @error('correo') is-invalid @enderror" />
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nro_documento">nro documento</label>
                            <input wire:model.lazy="nro_documento" type="text"
                                class="form-control @error('nro_documento') is-invalid @enderror" />
                            @error('nro_documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" wire:click.prevent="save" class="btn btn-primary btn-block">
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total de resultados: {{ $records->total() }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>apellidos</th>
                                    <th>documento</th>
                                    <th>genero</th>
                                    <th>celular</th>
                                    <th>correo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                @foreach ($records as $key => $record)
                                    <tr>
                                        <td class="text-center">{{ $record->id_suscriptor }}</td>
                                        <td>{{ $record->nombres }}</td>
                                        <td>{{ $record->apellidos }}</td>
                                        <td>{{ $record->nro_documento }}</td>
                                        <td>{{ $record->genero === 'M' ? 'MASCULINO' : 'FEMENINO' }}</td>
                                        <td>{{ $record->celular }}</td>
                                        <td>{{ $record->correo }}</td>
                                        <td class="text-center">
                                            <button wire:click.prevent="edit({{ $record->id_suscriptor }})"
                                                type="button" class="btn btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </button>

                                            <button wire:click.prevent="delete({{ $record->id_suscriptor }})"
                                                type="button" class="btn btn-danger btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- {!! $records->render() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
