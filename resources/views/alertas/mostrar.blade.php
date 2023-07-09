<x-app-layout>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
    <tbody>
      <div class="container-fluid"><br><br>
        <table class="table table-striped">
              <thead class="table-success">
                  <tr class="text-center">
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Hora</th>
                    <th>Opción</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($alertas as $alerta)
                      <tr>
                          <td>{{ $alerta->id }}</td>
                          <td>
                              <span class="titulo">{{ $alerta->titulo }}</span>
                              <input type="text" class="form-control edit-titulo" value="{{ $alerta->titulo }}" style="display: none">
                          </td>
                          <td>
                              <span class="descripcion">{{ $alerta->descripcion }}</span>
                              <input type="text" class="form-control edit-descripcion" value="{{ $alerta->descripcion }}" style="display: none">
                          </td>
                          <td>{{ $alerta->hora }}</td>
                          <td class="d-flex justify-content-center align-items-center">
                              <form action="{{ route('aeliminaralerta', ['id' => $alerta->id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este delito?')" class="mx-2"><i class="bi bi-trash3"></i></button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
        </table>
      </div>
    </tbody>
</html>
</x-app-layout>
