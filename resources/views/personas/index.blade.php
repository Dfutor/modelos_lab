<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Personas</title>
</head>
<body class="m-5">
    <h1>Personas</h1>

    <form id="personaForm" method="POST" action="/personas" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="persona_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
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
            <label for="rol" class="form-label">Rol</label>
            <input name="rol" id="rol" class="form-control" placeholder="Rol">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Personas</h2>

        <ul class="list-group">
            @foreach($personas as $persona)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $persona->nombre }} {{ $persona->apellido }}</span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarPersona(@json($persona))'
                        >Editar</button>

                        <form method="POST" action="/personas/{{ $persona->id }}" onsubmit="return confirm('¿Estás seguro de eliminar a {{ $persona->nombre }}?')">
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
        function editarPersona(persona) {
            const form = document.getElementById('personaForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/personas/${persona.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = persona.nombre;
            document.getElementById('apellido').value = persona.apellido;
            document.getElementById('fecha_nacimiento').value = persona.fecha_nacimiento ?? '';
            document.getElementById('telefono').value = persona.telefono ?? '';
            document.getElementById('correo').value = persona.correo ?? '';
            document.getElementById('rol').value = persona.rol ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('personaForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/personas';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>