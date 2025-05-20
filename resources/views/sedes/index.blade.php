<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Sedes</title>
</head>
<body class="m-5">
    <h1>Sedes</h1>

    <form id="sedeForm" method="POST" action="/sedes" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="sede_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre de la sede" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input name="direccion" id="direccion" class="form-control" placeholder="Dirección de la sede">
        </div>

        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Sedes</h2>

        <ul class="list-group">
            @foreach($sedes as $sede)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $sede->nombre }}</strong>
                        | Dirección: {{ $sede->direccion }}
                        | Ciudad: {{ $sede->ciudad }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarSede(@json($sede))'
                        >Editar</button>

                        <form method="POST" action="/sedes/{{ $sede->id }}" onsubmit="return confirm('¿Estás seguro de eliminar la sede {{ $sede->nombre }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function editarSede(sede) {
            const form = document.getElementById('sedeForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/sedes/${sede.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = sede.nombre ?? '';
            document.getElementById('direccion').value = sede.direccion ?? '';
            document.getElementById('ciudad').value = sede.ciudad ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('sedeForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/sedes';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>