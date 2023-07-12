<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto lg:px-6 lg:px-8">
      <div class="bg-white">
        <div class="p-6">
        <p class="text-display-1 font-bold mb-6 text-center"><strong>REGISTRO DE ARCHIVOS DE DELITOS</strong></p>
          <form class="text-center border border-gray-300 shadow-lg rounded-lg p-6 max-w-md mx-auto bg-blue-200" method="POST" action="guardar" enctype="multipart/form-data">
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
                  <label for="delito_id" class="block mb-2">Delito:</label>
                  <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="delito_id" name="delito_id">
                    @foreach($delitos as $delito)
                      <option value="{{ $delito->id }}">{{ $delito->tipo }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-4">
                  <label for="imagenDelito" class="block mb-2">Imagen del delito:</label>
                  <input type="file" id="imagenDelito" name="imagenDelito" class="form-input rounded-md" multiple>
              </div>
              <div class="mb-4">
                  <label for="videoDelito" class="block mb-2">Video del delito:</label>
                  <input type="file" id="videoDelito" name="videoDelito" class="form-input rounded-md">
              </div>
              <div class="mt-6 text-center">
                  <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded">Guardar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>