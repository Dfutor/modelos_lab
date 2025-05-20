<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Aulas</title>
</head>
<body class="m-5">
    <h1>Aulas</h1>

    <form id="aulaForm" method="POST" action="/aulas" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="aula_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="mb-3">
            <label for="id_sede" class="form-label">ID Sede</label>
            <input name="id_sede" id="id_sede" type="number" class="form-control" placeholder="ID de la sede" required>
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input name="codigo" id="codigo" type="number" class="form-control" placeholder="Código">
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input name="capacidad" id="capacidad" type="number" class="form-control" placeholder="Capacidad">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="">Seleccione tipo</option>
                <option value="aula">Aula</option>
                <option value="laboratorio">Laboratorio</option>
                <option value="auditorio">Auditorio</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input name="descripcion" id="descripcion" class="form-control" placeholder="Descripción">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Aulas</h2>

        <ul class="list-group">
            @foreach($aulas as $aula)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $aula->nombre }}</strong>
                        | Sede: {{ $aula->id_sede }}
                        | Código: {{ $aula->codigo }}
                        | Capacidad: {{ $aula->capacidad }}
                        | Tipo: {{ $aula->tipo }}
                        | {{ $aula->descripcion }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarAula(@json($aula))'
                        >Editar</button>

                        <form method="POST" action="/aulas/{{ $aula->id }}" onsubmit="return confirm('¿Estás seguro de eliminar el aula {{ $aula->nombre }}?')">
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
        function editarAula(aula) {
            const form = document.getElementById('aulaForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/aulas/${aula.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = aula.nombre ?? '';
            document.getElementById('id_sede').value = aula.id_sede ?? '';
            document.getElementById('codigo').value = aula.codigo ?? '';
            document.getElementById('capacidad').value = aula.capacidad ?? '';
            document.getElementById('tipo').value = aula.tipo ?? '';
            document.getElementById('descripcion').value = aula.descripcion ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('aulaForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/aulas';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>