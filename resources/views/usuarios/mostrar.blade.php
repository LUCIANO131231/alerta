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
                <th>Nombres</th>
                <th>Correo electrónico</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th class="text-center">Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id}}</td>
                <td>{{ $usuario->nombres}}</td>
                <td>{{ $usuario->email}}</td>
                <td>{{ $usuario->telefono}}</td>
                <td>{{ $usuario->direccion}}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <a href="#" class="mx-2 edit-btn" data-id="{{ $usuario->id }}" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal{{ $usuario->id }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('ueliminarusuario', ['id' => $usuario->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarUsuarioModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editarUsuarioModalLabel{{ $usuario->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <h5 class="modal-title text-center" id="editarUsuarioModalLabel{{ $usuario->id }}">FORMULARIO PARA EDITAR USUARIO</h5>
                        </div>
                          <div class="modal-body bg-blue-200">
                            <form method="POST" action="{{ route('uactualizarusuario', $usuario->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="nombres" class="block">Nombres:</label>
                                    <input type="text" id="nombres" name="nombres" class="form-input rounded-md w-full" value="{{ $usuario->nombres }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block">Correo:</label>
                                    <input type="email" id="email" name="email" class="form-input rounded-md w-full" value="{{ $usuario->email }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="telefono" class="block">Teléfono:</label>
                                    <input type="tel" id="telefono" name="telefono" class="form-input rounded-md w-full" value="{{ $usuario->telefono }}">
                                </div>
                                <div class="mb-4">
                                    <label for="direccion" class="block">Dirección:</label>
                                    <input id="direccion" name="direccion" class="form-input rounded-md w-full" value="{{ $usuario->direccion }}">
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
