<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4 text-center">REGISTRAR ALERTA</h1>
                    <form method="POST" action="guardar">
                        @csrf
                        <div class="mb-4">
                            <label id="descripcion" class="block mb-2">Titulo:</label>
                            <input type="text" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label id="hora" class="block mb-2">Descripción:</label>
                            <input type="text" class="form-input rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="delito_id" class="block mb-2">Usuario:</label>
                            <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="delito_id">
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="delito_id" class="block mb-2">Delito:</label>
                            <select class="form-select rounded-md w-full focus:outline-none focus:ring-blue-500 focus:border-blue-500" id="delito_id">
                                @foreach($delitos as $delito)
                                    <option value="{{ $delito->id }}">{{ $delito->tipoDelito }} - {{ $delito->lugarDelito }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

