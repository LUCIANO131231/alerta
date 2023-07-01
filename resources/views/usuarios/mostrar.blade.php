<x-app-layout>
<br><br><br>
    <center>
    <h1 style="font-size: 24px;"><strong>BD USUARIOS</strong></h1><br>
        <table class="table table-striped table-hover">
          <tr bgcolor='#AEB6BF'>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>CORREO</th>
            <th>TELEFONO</th>
            <th>DIRECCION</th>
          </tr>
          @foreach($usuarios as $usuario)
          <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nombres}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->telefono}}</td>
            <td>{{$usuario->direccion}}</td>
          </tr>
          @endforeach
        </table>
    </center>
</x-app-layout>