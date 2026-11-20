<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rutas con Laravel | Explorando Lugares</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <main class="container my-5">
    <h1 class="mb-4">Rutas (módulo Laravel)</h1>

    <form method="GET" action="{{ route('rutas.index') }}" class="row g-2 mb-4">
      <div class="col-md-6">
        <label for="provincia_id" class="visually-hidden">Provincia</label>
        <select id="provincia_id" name="provincia_id" class="form-select">
          <option value="">Todas las provincias</option>
          @foreach ($provincias as $provincia)
            <option value="{{ $provincia->id }}" @selected(request('provincia_id') == $provincia->id)>
              {{ $provincia->nombre }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-light w-100">Filtrar</button>
      </div>
      <div class="col-md-4 text-md-end">
        <a href="{{ route('rutas.json') }}" class="btn btn-outline-light">Ver JSON</a>
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Provincia</th>
            <th>Categoría</th>
            <th>Dificultad</th>
            <th>Distancia (km)</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($rutas as $ruta)
            <tr>
              <td>{{ $ruta->id }}</td>
              <td>{{ $ruta->nombre }}</td>
              <td>{{ $ruta->provincia->nombre }}</td>
              <td>{{ $ruta->categoria->nombre }}</td>
              <td>{{ $ruta->dificultad }}</td>
              <td>{{ $ruta->distancia_km }}</td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center">No hay rutas para mostrar.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>