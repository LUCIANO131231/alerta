<x-app-layout>
<br><br><br>
    <center>
    <h1 style="font-size: 24px;"><strong>REGISTRO DE DELITOS</strong></h1><br>
      <form method="POST" action="guardar">
        @csrf
        <input type="text" class="form-control mb-3  focus:bg-red-100" name="tipoDelito" placeholder="Ingrese la modalidad que ha sufrido del robo" required><br>
        <input type="text" class="form-control mb-3  focus:bg-red-100" name="lugarDelito" placeholder="Ingrese el lugar de los hechos" required><br>
        <input type="text" class="form-control mb-3  focus:bg-red-100" name="descripcion" placeholder="Por favor describa lo ocurrido!" required><br>
        <label for="imagenDelito">Imagen del Delito: </label>
        <input type="file" name="imagenDelito"><br>
        <label for="videoDelito">Video del Delito:</label>
        <input type="file" id="videoDelito">
        <select name="usuario_id">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
            @endforeach
        </select>
        <input type="submit" class="bg-blue-500 hover:bg-red-800 text-write font-bold py-2 px-4 rounded"  value="Guardar">
      </form>
    </center>

</x-app-layout>