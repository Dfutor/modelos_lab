<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Periodos</title>
</head>
<body class="m-5">
    <h1>Periodos</h1>

    <form id="periodoForm" method="POST" action="/periodos" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="periodo_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre del periodo" required>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input name="fecha_inicio" id="fecha_inicio" type="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input name="fecha_fin" id="fecha_fin" type="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Periodos</h2>

        <ul class="list-group">
            @foreach($periodos as $periodo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $periodo->nombre }}</strong>
                        | {{ $periodo->fecha_inicio }} - {{ $periodo->fecha_fin }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarPeriodo(@json($periodo))'
                        >Editar</button>

                        <form method="POST" action="/periodos/{{ $periodo->id }}" onsubmit="return confirm('¿Estás seguro de eliminar el periodo {{ $periodo->nombre }}?')">
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
        function editarPeriodo(periodo) {
            const form = document.getElementById('periodoForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/periodos/${periodo.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = periodo.nombre ?? '';
            document.getElementById('fecha_inicio').value = periodo.fecha_inicio ?? '';
            document.getElementById('fecha_fin').value = periodo.fecha_fin ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('periodoForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/periodos';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>