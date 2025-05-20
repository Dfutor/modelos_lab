<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Grados</title>
</head>
<body class="m-5">
    <h1>Grados</h1>

    <form id="gradoForm" method="POST" action="/grados" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="grado_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre del grado" required>
        </div>

        <div class="mb-3">
            <label for="nivel" class="form-label">Nivel</label>
            <input name="nivel" id="nivel" class="form-control" placeholder="Nivel (ej: Primaria, Secundaria)">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Grados</h2>

        <ul class="list-group">
            @foreach($grados as $grado)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $grado->nombre }}</strong>
                        | Nivel: {{ $grado->nivel }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarGrado(@json($grado))'
                        >Editar</button>

                        <form method="POST" action="/grados/{{ $grado->id }}" onsubmit="return confirm('¿Estás seguro de eliminar el grado {{ $grado->nombre }}?')">
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
        function editarGrado(grado) {
            const form = document.getElementById('gradoForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/grados/${grado.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = grado.nombre ?? '';
            document.getElementById('nivel').value = grado.nivel ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('gradoForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/grados';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>