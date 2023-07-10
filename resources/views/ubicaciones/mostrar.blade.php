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
                    <a href="#" class="mx-2 edit-btn" data-id="{{ $ubicacionDelito->id }}" data-bs-toggle="modal" data-bs-target="#editarUbicacionModal{{ $ubicacionDelito->id }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('beliminarubicacion', ['id' => $ubicacionDelito->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarUbicacionModal{{ $ubicacionDelito->id }}" tabindex="-1" aria-labelledby="editarUbicacionModal{{ $ubicacionDelito->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-block">
                            <h5 class="modal-title text-center" id="editarUbicacionModal{{ $ubicacionDelito->id }}">FORMULARIO PARA EDITAR USUARIO</h5>
                        </div>
                          <div class="modal-body bg-blue-200">
                            <form method="POST" action="{{ route('bactualizarubicacion', $ubicacionDelito->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="lugar" class="block mb-2">Lugar:</label>
                                    <input type="text" id="lugar" name="lugar" value="{{ $ubicacionDelito->lugar }}" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div class="mb-4">
                                    <label for="latitud" class="block mb-2">Latitud:</label>
                                    <input type="text" id="latitud" name="latitud" value="{{ $ubicacionDelito->latitud }}" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div class="mb-4">
                                    <label for="longitud" class="block mb-2">Longitud:</label>
                                    <input type="text" id="longitud" name="longitud" value="{{ $ubicacionDelito->longitud }}" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                                </div>
                                <div class="mb-4">
                                    <label for="map" class="block mb-2">Seleccionar ubicación:</label>
                                    <div id="map" style="height: 400px;"></div>
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
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet" />

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([51.5, -0.09]).addTo(map);

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitud').value = e.latlng.lat.toFixed(8);
            document.getElementById('longitud').value = e.latlng.lng.toFixed(8);
        });
    </script>
</html>
</x-app-layout>