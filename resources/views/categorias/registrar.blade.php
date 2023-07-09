<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto lg:px-6 lg:px-8">
      <div class="bg-white">
        <div class="p-6">
        <p class="text-display-1 font-bold mb-6 text-center"><strong>REGISTRO DE CATEGORIAS POR DELITOS</strong></p>
          <form class="text-center border border-gray-300 shadow-lg rounded-lg p-6 max-w-md mx-auto bg-blue-200" method="POST" action="guardar">
              @csrf
              <div class="mb-4">
                  <label for="delito_id" class="block mb-2">Delito:</label>
                  <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="delito_id" name="delito_id">
                    @foreach($delitos as $delito)
                      <option value="{{ $delito->id }}">{{ $delito->tipo }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="mb-4">
                  <label for="categoria" class="block mb-2">Categoria por delito:</label>
                  <select id="categoria" name="categoria" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="Crimen">Crimen</option>
                    <option value="Violencia">Violencia</option>
                    <option value="Delitos contra la propiedad">Delitos contra la propiedad</option>
                    <option value="Delitos contra la persona">Delitos contra la persona</option>
                    <option value="Delitos sexuales">Delitos sexuales</option>
                    <option value="Delitos informáticos">Delitos informáticos</option>
                    <option value="Delitos financieros">Delitos financieros</option>
                    <option value="Delitos de drogas">Delitos de drogas</option>
                    <option value="Delitos de tráfico">Delitos de tráficos</option>
                    <option value="Delitos contra la integridad física">Delitos contra la integridad física</option>
                    <option value="Delitos contra la seguridad pública">Delitos contra la seguridad pública</option>
                    <option value="Delitos de odio">Delitos de odio</option>
                    <option value="Delitos contra la salud pública">Delitos contra la salud pública</option>
                    <option value="Delitos contra el patrimonio cultural">Delitos contra el patrimonio cultural</option>
                    <option value="Delitos contra la libertad">Delitos contra la libertad</option>
                    <option value="Delitos medioambientales">Delitos medioambientales</option>
                  </select>
              </div>
              <div class="mb-4">
                  <label for="nivel" class="block mb-2">Nivel del delito:</label>
                  <select id="nivel" name="nivel" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="Bajo">Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Alto">Alto</option>
                    <option value="Crítico">Crítico</option>
                  </select>
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