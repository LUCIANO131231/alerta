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
                <th>Categoría por delito</th>
                <th>Nivel del delito</th>
                <th>Delito</th>
                <th class="text-center">Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->categoria }}</td>
                <td>{{ $categoria->nivel }}</td>
                <td>{{ $categoria->delito->tipo }}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <a href="#" class="mx-2 edit-btn" data-id="{{ $categoria->id }}" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal{{ $categoria->id }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('celiminarcategoria', ['id' => $categoria->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este delito?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarCategoriaModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="editarCategoriaModal{{ $categoria->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <h5 class="modal-title text-center" id="editarCategoriaModal{{ $categoria->id }}">FORMULARIO PARA CATEGORIAS POR DELITOS</h5>
                        </div>
                          <div class="modal-body bg-blue-200">
                            <form method="POST" action="{{ route('cactualizarcategoria', $categoria->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="categoria" class="block mb-2">Categoria por delito:</label>
                                    <select id="categoria" name="categoria" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                      <option value="Crimen" {{ $categoria->categoria == 'Crimen' ? 'selected' : '' }}>Crimen</option>
                                      <option value="Violencia" {{ $categoria->categoria == 'Violencia' ? 'selected' : '' }}>Violencia</option>
                                      <option value="Delitos contra la propiedad" {{ $categoria->categoria == 'Delitos contra la propiedad' ? 'selected' : '' }}>Delitos contra la propiedad</option>
                                      <option value="Delitos contra la persona" {{ $categoria->categoria == 'Delitos contra la persona' ? 'selected' : '' }}>Delitos contra la persona</option>
                                      <option value="Delitos sexuales" {{ $categoria->categoria == 'Delitos sexuales' ? 'selected' : '' }}>Delitos sexuales</option>
                                      <option value="Delitos informáticos" {{ $categoria->categoria == 'Delitos informáticos' ? 'selected' : '' }}>Delitos informáticos</option>
                                      <option value="Delitos de tráfico" {{ $categoria->categoria == 'Delitos de tráficos' ? 'selected' : '' }}>Delitos de tráficos</option>
                                      <option value="Delitos contra la integridad física" {{ $categoria->categoria == 'Delitos contra la integridad física' ? 'selected' : '' }}>Delitos contra la integridad física</option>
                                      <option value="Delitos contra la seguridad pública" {{ $categoria->categoria == 'Delitos contra la seguridad pública' ? 'selected' : '' }}>Delitos contra la seguridad pública</option>
                                      <option value="Delitos de odio" {{ $categoria->categoria == 'Delitos de odio' ? 'selected' : '' }}>Delitos de odio</option>
                                      <option value="Delitos contra la salud pública" {{ $categoria->categoria == 'Delitos contra la salud pública' ? 'selected' : '' }}>Delitos contra la salud pública</option>
                                      <option value="Delitos contra el patrimonio cultural" {{ $categoria->categoria == 'Delitos contra el patrimonio cultural' ? 'selected' : '' }}>Delitos contra el patrimonio cultural</option>
                                      <option value="Delitos contra la libertad" {{ $categoria->categoria == 'Delitos contra la libertad' ? 'selected' : '' }}>Delitos contra la libertad</option>
                                      <option value="Delitos medioambientales" {{ $categoria->categoria == 'Delitos medioambientales' ? 'selected' : '' }}>Delitos medioambientales</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="nivel" class="block mb-2">Nivel del delito:</label>
                                    <select id="nivel" name="nivel" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                      <option value="Bajo" {{ $categoria->nivel == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                                      <option value="Medio" {{ $categoria->nivel == 'Medio' ? 'selected' : '' }}>Medio</option>
                                      <option value="Alto" {{ $categoria->nivel == 'Alto' ? 'selected' : '' }}>Alto</option>
                                      <option value="Crítico" {{ $categoria->nivel == 'Crítico' ? 'selected' : '' }}>Crítico</option>
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