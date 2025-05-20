<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Estudiantes</title>
</head>
<body class="m-5">
    <h1>Estudiantes</h1>

    <form id="estudianteForm" method="POST" action="/estudiantes" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="estudiante_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" id="telefono" class="form-control" placeholder="Teléfono">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo">
        </div>

        <div class="mb-3">
            <label for="id_persona" class="form-label">ID Persona</label>
            <input name="id_persona" id="id_persona" type="number" class="form-control" placeholder="ID de la persona" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Estudiantes</h2>

        <ul class="list-group">
            @foreach($estudiantes as $estudiante)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</strong>
                        | Fecha Nac: {{ $estudiante->fecha_nacimiento }}
                        | Tel: {{ $estudiante->telefono }}
                        | Correo: {{ $estudiante->correo }}
                        | Persona: {{ $estudiante->id_persona }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarEstudiante(@json($estudiante))'
                        >Editar</button>

                        <form method="POST" action="/estudiantes/{{ $estudiante->id }}" onsubmit="return confirm('¿Estás seguro de eliminar al estudiante {{ $estudiante->nombre }}?')">
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
        function editarEstudiante(estudiante) {
            const form = document.getElementById('estudianteForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/estudiantes/${estudiante.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = estudiante.nombre ?? '';
            document.getElementById('apellido').value = estudiante.apellido ?? '';
            document.getElementById('fecha_nacimiento').value = estudiante.fecha_nacimiento ?? '';
            document.getElementById('telefono').value = estudiante.telefono ?? '';
            document.getElementById('correo').value = estudiante.correo ?? '';
            document.getElementById('id_persona').value = estudiante.id_persona ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('estudianteForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/estudiantes';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>