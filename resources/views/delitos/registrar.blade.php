<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto lg:px-6 lg:px-8">
      <div class="bg-white">
        <div class="p-6">
        <p class="text-display-1 font-bold mb-6 text-center"><strong>REGISTRO DE DELITOS</strong></p>
          <form class="text-center border border-gray-300 shadow-lg rounded-lg p-6 max-w-md mx-auto bg-blue-200" method="POST" action="guardar">
              @csrf
              <div class="mb-4">
                  <label for="descripcion" class="block">Descripción del delito:</label>
                  <textarea type="text" id="descripcion" name="descripcion"  class="form-input rounded-md w-full" placeholder="Haga una descripción de lo ocurrido" required></textarea>
              </div>
              <div class="mb-4">
                  <label for="tipo" class="block mb-2">Tipo de delito:</label>
                  <select id="tipo" name="tipo" class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="Robo">Robo</option>
                    <option value="Hurto">Hurto</option>
                    <option value="Vandalismo">Vandalismo</option>
                    <option value="Homicidio">Homicidio</option>
                    <option value="Violación">Violación</option>
                    <option value="Estafa">Estafa</option>
                    <option value="Agresión">Agresión</option>
                    <option value="Secuestro">Secuestro</option>
                    <option value="Tráfico de drogas">Tráfico de drogas</option>
                    <option value="Amenazas">Amenazas</option>
                    <option value="Extorsión">Extorsión</option>
                    <option value="Abuso sexual">Abuso sexual</option>
                    <option value="Violencia doméstica">Violencia doméstica</option>
                    <option value="Maltrato infantil">Maltrato infantil</option>
                    <option value="Delitos informáticos">Delitos informáticos</option>
                    <option value="Delitos medioambientales">Delitos medioambientales</option>
                  </select>
              </div>
              <div class="mb-4">
                  <label for="usuario_id" class="block mb-2">Usuario:</label>
                  <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="usuario_id" name="usuario_id">
                    @foreach($usuarios as $usuario)
                      <option value="{{ $usuario->id }}">{{ $usuario->nombres }}</option>
                    @endforeach
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