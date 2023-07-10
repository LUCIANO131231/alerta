<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <p class="text-display-1 font-bold mb-6 text-center"><strong>REGISTRO DE UBICACION DE DELITO</strong></p>
                    <form class="text-center border border-gray-300 shadow-lg rounded-lg p-6 max-w-md mx-auto bg-blue-200" method="POST" action="guardar">
                        @csrf
                        <div class="mb-4">
                            <label for="usuario_id" class="block mb-2">Usuario:</label>
                            <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="usuario_id" name="usuario_id">
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="lugar" class="block mb-2">Lugar:</label>
                            <input type="text" id="lugar" name="lugar" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="latitud" class="block mb-2">Latitud:</label>
                            <input type="text" id="latitud" name="latitud" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="longitud" class="block mb-2">Longitud:</label>
                            <input type="text" id="longitud" name="longitud" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="map" class="block mb-2">Seleccionar ubicación:</label>
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <div class="mt-6 text-center">
                            <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
</x-app-layout>
