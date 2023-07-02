<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4 text-center">REGISTRO DE USUARIOS</h1>
                    <form method="POST" action="guardar">
                        @csrf
                        <div class="mb-4">
                            <label for="nombres" class="block text-gray-700">Nombres:</label>
                            <input type="text" id="nombres" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500"  placeholder="Ingrese sus nombres" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Correo:</label>
                            <input type="email" id="email"  class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ingrese su correo" required>
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700">Teléfono:</label>
                            <input type="number" id="telefono"  class="form-input rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="direccion" class="block text-gray-700">Dirección:</label>
                            <input type="text" id="direccion"class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ingrese su dirección">
                        </div>
                        <div class="mt-6 text-center">
                          <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
