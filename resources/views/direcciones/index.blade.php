<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Direcciones</title>
</head>
<body class="m-5">
    <h1>Direcciones</h1>

    <form id="direccionForm" method="POST" action="/direcciones" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="direccion_id">

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
        </div>

        <div class="mb-3">
            <label for="id_ciudad" class="form-label">ID Ciudad</label>
            <input name="id_ciudad" id="id_ciudad" type="number" class="form-control" placeholder="ID de la ciudad" required>
        </div>

        <div class="mb-3">
            <label for="id_persona" class="form-label">ID Persona</label>
            <input name="id_persona" id="id_persona" type="number" class="form-control" placeholder="ID de la persona" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Direcciones</h2>

        <ul class="list-group">
            @foreach($direcciones as $direccion)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $direccion->direccion }}</strong>
                        | Ciudad: {{ $direccion->id_ciudad }}
                        | Persona: {{ $direccion->id_persona }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarDireccion(@json($direccion))'
                        >Editar</button>

                        <form method="POST" action="/direcciones/{{ $direccion->id }}" onsubmit="return confirm('¿Estás seguro de eliminar la dirección {{ $direccion->direccion }}?')">
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
        function editarDireccion(direccion) {
            const form = document.getElementById('direccionForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/direcciones/${direccion.id}`;
            methodInput.value = 'PUT';

            document.getElementById('direccion').value = direccion.direccion ?? '';
            document.getElementById('id_ciudad').value = direccion.id_ciudad ?? '';
            document.getElementById('id_persona').value = direccion.id_persona ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('direccionForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/direcciones';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>