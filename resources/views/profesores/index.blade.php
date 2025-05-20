<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Profesores</title>
</head>
<body class="m-5">
    <h1>Profesores</h1>

    <form id="profesorForm" method="POST" action="/profesores" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="profesor_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input name="titulo" id="titulo" class="form-control" placeholder="Título académico">
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo electrónico">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Profesores</h2>

        <ul class="list-group">
            @foreach($profesores as $profesor)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $profesor->nombre }} {{ $profesor->apellido }}</strong>
                        | Título: {{ $profesor->titulo }}
                        | Correo: {{ $profesor->correo }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarProfesor(@json($profesor))'
                        >Editar</button>

                        <form method="POST" action="/profesores/{{ $profesor->id }}" onsubmit="return confirm('¿Estás seguro de eliminar al profesor {{ $profesor->nombre }}?')">
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
        function editarProfesor(profesor) {
            const form = document.getElementById('profesorForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/profesores/${profesor.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = profesor.nombre ?? '';
            document.getElementById('apellido').value = profesor.apellido ?? '';
            document.getElementById('titulo').value = profesor.titulo ?? '';
            document.getElementById('correo').value = profesor.correo ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('profesorForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/profesores';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>