<x-app-layout>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<div class="container">
    <br><br>
    <table class="table table-striped">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Tipo de delito</th>
                <th>Hora y Fecha</th>
                <th>Usuario</th>
                <th class="text-center">Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($delitos as $delito)
            <tr>
                <td>{{ $delito->id }}</td>
                <td>{{ $delito->descripcion }}</td>
                <td>{{ $delito->tipo }}</td>
                <td>{{ $delito->fechaHoraDelito }}</td>
                <td>{{ $delito->usuario->nombres }}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <a href="#" class="mx-2 edit-btn" data-id="{{ $delito->id }}" data-bs-toggle="modal" data-bs-target="#editarDelitoModal{{ $delito->id }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('deliminardelito', ['id' => $delito->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este delito?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarDelitoModal{{ $delito->id }}" tabindex="-1" aria-labelledby="editarDelitoModal{{ $delito->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <h5 class="modal-title text-center" id="editarDelitoModal{{ $delito->id }}">FORMULARIO PARA EDITAR DELITO</h5>
                        </div>
                          <div class="modal-body bg-blue-200">
                            <form method="POST" action="{{ route('dactualizardelito', $delito->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="descripcion" class="block">Descripción del delito:</label>
                                    <textarea id="descripcion" name="descripcion" class="form-input rounded-md w-full" required>{{ $delito->descripcion }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="tipo" class="block mb-2">Tipo de delito:</label>
                                    <select id="tipo" name="tipo" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        <option value="Robo" {{ $delito->tipo == 'Robo' ? 'selected' : '' }}>Robo</option>
                                        <option value="Hurto" {{ $delito->tipo == 'Hurto' ? 'selected' : '' }}>Hurto</option>
                                        <option value="Vandalismo" {{ $delito->tipo == 'Vandalismo' ? 'selected' : '' }}>Vandalismo</option>
                                        <option value="Homicidio" {{ $delito->tipo == 'Homicidio' ? 'selected' : '' }}>Homicidio</option>
                                        <option value="Violación" {{ $delito->tipo == 'Violación' ? 'selected' : '' }}>Violación</option>
                                        <option value="Estafa" {{ $delito->tipo == 'Estafa' ? 'selected' : '' }}>Estafa</option>
                                        <option value="Agresión" {{ $delito->tipo == 'Agresión' ? 'selected' : '' }}>Agresión</option>
                                        <option value="Secuestro" {{ $delito->tipo == 'Secuestro' ? 'selected' : '' }}>Secuestro</option>
                                        <option value="Tráfico de drogas" {{ $delito->tipo == 'Tráfico de drogas' ? 'selected' : '' }}>Tráfico de drogas</option>
                                        <option value="Amenazas" {{ $delito->tipo == 'Amenazas' ? 'selected' : '' }}>Amenazas</option>
                                        <option value="Extorsión" {{ $delito->tipo == 'Extorsión' ? 'selected' : '' }}>Extorsión</option>
                                        <option value="Abuso sexual" {{ $delito->tipo == 'Abuso sexual' ? 'selected' : '' }}>Abuso sexual</option>
                                        <option value="Violencia doméstica" {{ $delito->tipo == 'Violencia doméstica' ? 'selected' : '' }}>Violencia doméstica</option>
                                        <option value="Maltrato infantil" {{ $delito->tipo == 'Maltrato infantil' ? 'selected' : '' }}>Maltrato infantil</option>
                                        <option value="Delitos informáticos" {{ $delito->tipo == 'Delitos informáticos' ? 'selected' : '' }}>Delitos informáticos</option>
                                        <option value="Delitos medioambientales" {{ $delito->tipo == 'Delitos medioambientales' ? 'selected' : '' }}>Delitos medioambientales</option>
                                    </select>
                                </div>
                          </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
</html>
</x-app-layout>