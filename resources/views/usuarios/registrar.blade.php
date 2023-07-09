<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto lg:px-6 lg:px-8">
      <div class="bg-white">
        <div class="p-6">
        <p class="text-display-1 font-bold mb-6 text-center"><strong>REGISTRO DE USUARIOS</strong></p>
          <form class="text-center border border-gray-300 shadow-lg rounded-lg p-6 max-w-md mx-auto bg-blue-200" method="POST" action="guardar">
              @csrf
              <div class="mb-4">
                  <label for="nombres" class="block">Nombres:</label>
                  <input type="text" id="nombres" name="nombres" class="form-input rounded-md w-full"  placeholder="Ingrese sus nombres" required>
              </div>
              <div class="mb-4">
                  <label for="email" class="block">Correo:</label>
                  <input type="email" id="email" name="email"  class="form-input rounded-md w-full" placeholder="Ingrese su correo" required>
              </div>
              <div class="mb-4">
                  <label for="password" class="block">Contraseña:</label>
                  <input type="password" id="password" name="password" class="form-input rounded-md w-full" placeholder="Ingrese su contraseña" required>
              </div>
              <div class="mb-4">
                  <label for="telefono" class="block">Teléfono:</label>
                  <input type="tel" id="telefono" name="telefono"  class="form-input rounded-md w-full">
              </div>
              <div class="mb-4">
                  <label for="direccion" class="block">Dirección:</label>
                  <textarea type="text" id="direccion" name="direccion" class="form-input rounded-md w-full" placeholder="Ingrese su dirección"></textarea>
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
