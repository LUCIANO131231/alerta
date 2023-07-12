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
                <th>Usuario</th>
                <th>Delito</th>
                <th>Imagen</th>
                <th>Video</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($archivos as $archivo)
            <tr>
                <td>{{ $archivo->id }}</td>
                <td>{{ $archivo->usuario->nombres }}</td>
                <td>{{ $archivo->delito->tipo }}</td>
                <td>
                    <div class="image-container">
                        @if ($archivo->imagenDelito)
                        <img src="{{ asset('imagenes/' . $archivo->imagenDelito) }}"  width="200px" height="200px">
                        @else
                        No se ha cargado ninguna imagen.
                        @endif
                    </div>
                </td>
                <td>
                    @if ($archivo->videoDelito)
                    <video src="{{ asset('videos/' . $archivo->videoDelito) }}" controls></video>
                    @else
                    No se ha cargado ningún video.
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</html>
</x-app-layout>