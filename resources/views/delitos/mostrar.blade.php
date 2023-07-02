<x-app-layout>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container"><br><br><br>

        <table class="table table-bordered mt-4">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Tipo de Delito</th>
                    <th>Lugar de Delito</th>
                    <th>Hora de Delito</th>
                    <th>Descripción</th>
                    <th>Imagen del Delito</th>
                    <th>Video del Delito</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($delitos as $delito)
                <tr>
                    <td>{{ $delito->id}}</td>
                    <td>{{ $delito->tipoDelito }}</td>
                    <td>{{ $delito->lugarDelito }}</td>
                    <td>{{ $delito->horaDelito }}</td>
                    <td>{{ $delito->descripcion }}</td>
                    <td>
                        @if ($delito->imagenDelito)
                            <img src="{{ asset('imagenes/' . $delito->imagenDelito) }}" alt="Imagen del Delito" class="img-fluid">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td>
                        @if ($delito->videoDelito)
                            <div class="embed-responsive embed-responsive-16by9">
                                <video controls class="embed-responsive-item">
                                    <source src="{{ asset('videos/' . $delito->videoDelito) }}" type="video/mp4">
                                    Tu navegador no soporta el elemento video.
                                </video>
                            </div>
                        @else
                            Sin video
                        @endif
                    </td>
                    <td>
                        @php
                            $usuario = \App\Models\Usuario::find($delito->usuario_id);
                        @endphp
                        {{ $usuario ? $usuario->nombres : 'Usuario no encontrado' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</x-app-layout>
