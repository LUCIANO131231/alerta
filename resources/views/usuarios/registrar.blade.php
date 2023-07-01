<x-app-layout>
<br><br><br>
    <center>
    <h1 style="font-size: 24px;"><strong>REGISTRO DE USUARIOS</strong></h1><br>
      <form method="POST" action="guardar">
        @csrf
        <input type="text" class="form-control mb-3  focus:bg-red-100" name="nombres" placeholder="Ingrese sus nombres" required><br>
        <input type="email" class="form-control mb-3  focus:bg-red-100" name="email" placeholder="Ingrese su correo" required><br>
        <input type="number" class="form-control mb-3  focus:bg-red-100" name="telefono" required><br>
        <input type="text" class="form-control mb-3  focus:bg-red-100" name="direccion" placeholder="Ingrese su direccion"><br>
        <input type="submit" class="bg-blue-500 hover:bg-red-800 text-write font-bold py-2 px-4 rounded"  value="Guardar">
      </form>
    </center>

</x-app-layout>