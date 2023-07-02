<html>
<head>
    <!-- ... Resto del código ... -->
</head>
<body>
    <h1>Listado de Delitos</h1>

    <table>
        <thead>
            <tr>
                <th>Tipo de Delito</th>
                <th>Lugar de Delito</th>
                <th>Hora de Delito</th>
                <th>Descripción</th>
                <th>Imagen del Delito</th>
                <th>Video del Delito</th>
                <!-- Otros campos si los hay -->
            </tr>
        </thead>
        <tbody>
            @foreach ($delitos as $delito)
            <tr>
                <td>{{ $delito->tipoDelito }}</td>
                <td>{{ $delito->lugarDelito }}</td>
                <td>{{ $delito->horaDelito }}</td>
                <td>{{ $delito->descripcion }}</td>
                <td>
                    @if ($delito->imagenDelito)
                        <img src="{{ asset('imagenes/' . $delito->imagenDelito) }}" alt="Imagen del Delito">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>
                    @if ($delito->videoDelito)
                        <video controls>
                            <source src="{{ asset('videos/' . $delito->videoDelito) }}" type="video/mp4">
                            Tu navegador no soporta el elemento video.
                        </video>
                    @else
                        Sin video
                    @endif
                </td>
                <!-- Otros campos si los hay -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
