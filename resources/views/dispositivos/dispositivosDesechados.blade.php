@extends('index')

@section('content')
    <!-- Ejemplo de maquetacion de contenido -->
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="row">
                    <div class="col-11.5">
                        <h1 class="card-title m-0 me-2">Dispositivos Desechados 🗑️</h1>
                        <br>
                    </div>
                    <form action="{{ route('filtrar-por-tipo-desechados') }}" method="GET">
                        @csrf
                        <div class="col-8">
                            <label for="tipo">Filtrar por nombre: </label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="todos">Todos</option>
                                @foreach ($contados as $tipo => $cantidad)
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                @foreach ($contados as $tipo => $cantidad)
                                    <th>{{ $tipo }} <span>{{ $cantidad }}</span></th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-11.5 col-lg-11.5 order-2 m-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>NUMERO DE SERIE</th>
                                <th>MARCA</th>
                                <th>MODELO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dispositivos as $dispositivo)
                                <tr>
                                    <td>{{ $dispositivo->nombredispositivo }}</td>
                                    <td>{{ $dispositivo->descripcion }}</td>
                                    <td>{{ $dispositivo->num_serie }}</td>
                                    <td>{{ $dispositivo->marca }}</td>
                                    <td>{{ $dispositivo->modelo }}</td>
                                    <td @class(['desechado' => $dispositivo->nombreestado === 'desechado'])>
                                        <span class="badge bg-warning">{{ $dispositivo->nombreestado }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
