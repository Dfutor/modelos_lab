<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Clases</title>
</head>
<body class="m-5">
    <h1>Clases</h1>

    <form id="claseForm" method="POST" action="/clases" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="clase_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre de la clase" required>
        </div>

        <div class="mb-3">
            <label for="id_grado" class="form-label">ID Grado</label>
            <input name="id_grado" id="id_grado" type="number" class="form-control" placeholder="ID del grado" required>
        </div>

        <div class="mb-3">
            <label for="id_aula" class="form-label">ID Aula</label>
            <input name="id_aula" id="id_aula" type="number" class="form-control" placeholder="ID del aula" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Clases</h2>

        <ul class="list-group">
            @foreach($clases as $clase)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $clase->nombre }}</strong>
                        | Grado: {{ $clase->id_grado }}
                        | Aula: {{ $clase->id_aula }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarClase(@json($clase))'
                        >Editar</button>

                        <form method="POST" action="/clases/{{ $clase->id }}" onsubmit="return confirm('¿Estás seguro de eliminar la clase {{ $clase->nombre }}?')">
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
        function editarClase(clase) {
            const form = document.getElementById('claseForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/clases/${clase.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = clase.nombre ?? '';
            document.getElementById('id_grado').value = clase.id_grado ?? '';
            document.getElementById('id_aula').value = clase.id_aula ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('claseForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/clases';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>