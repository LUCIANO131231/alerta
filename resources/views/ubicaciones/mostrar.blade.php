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
                <th>Lugar</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Usuario</th>
                <th class="text-center">Opcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ubicacionDelitos as $ubicacionDelito)
            <tr>
                <td>{{ $ubicacionDelito->id}}</td>
                <td>{{ $ubicacionDelito->lugar}}</td>
                <td>{{ $ubicacionDelito->latitud}}</td>
                <td>{{ $ubicacionDelito->longitud}}</td>
                <td>{{ $ubicacionDelito->usuario->nombres}}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <form action="{{ route('beliminarubicacion', ['id' => $ubicacionDelito->id]) }}" method="POST">
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
</html>
</x-app-layout>