<div>
    {{-- <x-loading-indicator /> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Buscar</h3>
                    </div>
                    <div class="card-body">
                        @include('partials.search')
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registro de categorias</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input wire:model.lazy="nombre" type="text"
                                class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="fecha_ini">Fecha inicio</label>
                            <input wire:model.lazy="fecha_ini" type="datetime-local"
                                class="form-control @error('fecha_ini') is-invalid @enderror" />
                            @error('fecha_ini')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="fecha_fin">Fecha fin</label>
                            <input wire:model.lazy="fecha_fin" type="datetime-local"
                                class="form-control @error('fecha_fin') is-invalid @enderror" />
                            @error('fecha_fin')
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
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                                @foreach ($records as $key => $record)
                                    <tr>
                                        <td class="text-center">{{ $record->id_evento }}</td>
                                        <td>{{ $record->nombre }}</td>
                                        <td>{{ $record->fecha_ini }}</td>
                                        <td>{{ $record->fecha_fin }}</td>
                                        <td class="text-center">
                                            <button wire:click.prevent="edit({{ $record->id_evento }})" type="button"
                                                class="btn btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <button wire:click="$emit('RegistroDelete',{{ $record->id_evento }})"
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
{{-- @push('js')
@include('partials.alerts')
<script>
document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('close_modal', Msg => {
            $('#modelId').modal('hide');
        });
        window.livewire.on('open_modal', Msg => {
            $('#modelId').modal('show');
        });
    });
</script>
@endpush --}}
