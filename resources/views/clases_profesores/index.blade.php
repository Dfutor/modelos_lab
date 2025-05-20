<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Clases Profesores</title>
</head>
<body class="m-5">
    <h1>Clases Profesores</h1>

    <form id="claseProfesorForm" method="POST" action="/clases_profesores" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="clase_profesor_id">

        <div class="mb-3">
            <label for="id_clase" class="form-label">ID Clase</label>
            <input name="id_clase" id="id_clase" type="number" class="form-control" placeholder="ID de la clase" required>
        </div>

        <div class="mb-3">
            <label for="id_profesor" class="form-label">ID Profesor</label>
            <input name="id_profesor" id="id_profesor" type="number" class="form-control" placeholder="ID del profesor" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Clases Profesores</h2>

        <ul class="list-group">
            @foreach($clases_profesores as $cp)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>ID Clase:</strong> {{ $cp->id_clase }}
                        | <strong>ID Profesor:</strong> {{ $cp->id_profesor }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarClaseProfesor(@json($cp))'
                        >Editar</button>

                        <form method="POST" action="/clases_profesores/{{ $cp->id }}" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
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
        function editarClaseProfesor(cp) {
            const form = document.getElementById('claseProfesorForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/clases_profesores/${cp.id}`;
            methodInput.value = 'PUT';

            document.getElementById('id_clase').value = cp.id_clase ?? '';
            document.getElementById('id_profesor').value = cp.id_profesor ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('claseProfesorForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/clases_profesores';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>