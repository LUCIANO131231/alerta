<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4 text-center">REGISTRO DE DELITOS</h1>
                    <form method="POST" action="guardar" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="tipoDelito" class="block mb-2">Modalidad de robo:</label>
                            <input type="text" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="tipoDelito" required>
                        </div>
                        <div class="mb-4">
                            <label for="lugarDelito" class="block mb-2">Lugar de los hechos:</label>
                            <input type="text" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="lugarDelito" required>
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="block mb-2">Descripción del delito:</label>
                            <textarea class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="descripcion" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="imagenDelito" class="block mb-2">Imagen del delito:</label>
                            <input type="file" class="form-input" name="imagenDelito">
                        </div>
                        <div class="mb-4">
                            <label for="videoDelito" class="block mb-2">Video del delito:</label>
                            <input type="file" class="form-input" name="videoDelito">
                        </div>
                        <div class="mb-4">
                            <label for="usuario_id" class="block mb-2">Usuario:</label>
                            <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" name="usuario_id">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>