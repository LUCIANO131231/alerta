<x-app-layout>
    <html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container"><br><br><br>

            <table class="table table-bordered mt-4">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Correo electrónico</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id}}</td>
                        <td>
                            <span id="nombres-{{ $usuario->id }}">{{ $usuario->nombres }}</span>
                            <input type="text" class="form-control" id="edit-nombres-{{ $usuario->id }}" value="{{ $usuario->nombres }}" style="display: none">
                        </td>
                        <td>
                            <span id="email-{{ $usuario->id }}">{{ $usuario->email }}</span>
                            <input type="text" class="form-control" id="edit-email-{{ $usuario->id }}" value="{{ $usuario->email }}" style="display: none">
                        </td>
                        <td>
                            <span id="telefono-{{ $usuario->id }}">{{ $usuario->telefono }}</span>
                            <input type="text" class="form-control" id="edit-telefono-{{ $usuario->id }}" value="{{ $usuario->telefono }}" style="display: none">
                        </td>
                        <td>
                            <span id="direccion-{{ $usuario->id }}">{{ $usuario->direccion }}</span>
                            <input type="text" class="form-control" id="edit-direccion-{{ $usuario->id }}" value="{{ $usuario->direccion }}" style="display: none">
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a href="#" class="mx-2 edit-btn" data-id="{{ $usuario->id }}"><i class="bi bi-pencil-square"></i></a>
                            <button class="btn btn-danger btn-sm save-btn" data-id="{{ $usuario->id }}" style="display: none">Guardar</button>
                            <form action="{{ route('ueliminarusuario', ['id' => $usuario->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const editBtns = document.querySelectorAll('.edit-btn');
                const saveBtns = document.querySelectorAll('.save-btn');

                editBtns.forEach(function (editBtn) {
                    editBtn.addEventListener('click', function (event) {
                        event.preventDefault();
                        const userId = this.getAttribute('data-id');
                        document.getElementById('nombres-' + userId).style.display = 'none';
                        document.getElementById('email-' + userId).style.display = 'none';
                        document.getElementById('telefono-' + userId).style.display = 'none';
                        document.getElementById('direccion-' + userId).style.display = 'none';

                        document.getElementById('edit-nombres-' + userId).style.display = 'block';
                        document.getElementById('edit-email-' + userId).style.display = 'block';
                        document.getElementById('edit-telefono-' + userId).style.display = 'block';
                        document.getElementById('edit-direccion-' + userId).style.display = 'block';

                        document.getElementById('edit-nombres-' + userId).focus();

                        document.querySelector('.save-btn[data-id="' + userId + '"]').style.display = 'block';
                    });
                });

                saveBtns.forEach(function (saveBtn) {
                    saveBtn.addEventListener('click', function (event) {
                        event.preventDefault();
                        const userId = this.getAttribute('data-id');

                        const updatedNombres = document.getElementById('edit-nombres-' + userId).value;
                        const updatedEmail = document.getElementById('edit-email-' + userId).value;
                        const updatedTelefono = document.getElementById('edit-telefono-' + userId).value;
                        const updatedDireccion = document.getElementById('edit-direccion-' + userId).value;

                        document.getElementById('nombres-' + userId).textContent = updatedNombres;
                        document.getElementById('email-' + userId).textContent = updatedEmail;
                        document.getElementById('telefono-' + userId).textContent = updatedTelefono;
                        document.getElementById('direccion-' + userId).textContent = updatedDireccion;

                        document.getElementById('nombres-' + userId).style.display = 'block';
                        document.getElementById('email-' + userId).style.display = 'block';
                        document.getElementById('telefono-' + userId).style.display = 'block';
                        document.getElementById('direccion-' + userId).style.display = 'block';

                        document.getElementById('edit-nombres-' + userId).style.display = 'none';
                        document.getElementById('edit-email-' + userId).style.display = 'none';
                        document.getElementById('edit-telefono-' + userId).style.display = 'none';
                        document.getElementById('edit-direccion-' + userId).style.display = 'none';

                        this.style.display = 'none';
});
                });
            });
        </script>
</x-app-layout>


