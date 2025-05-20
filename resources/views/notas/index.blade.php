<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Horarios</title>
</head>
<body class="m-5">
    <h1>Horarios</h1>

    <form id="horarioForm" method="POST" action="/horarios" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="horario_id">

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input name="dia" id="dia" class="form-control" placeholder="Día (ej: Lunes)" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de Inicio</label>
            <input name="hora_inicio" id="hora_inicio" type="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de Fin</label>
            <input name="hora_fin" id="hora_fin" type="time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Horarios</h2>

        <ul class="list-group">
            @foreach($horarios as $horario)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $horario->dia }}</strong>
                        | {{ $horario->hora_inicio }} - {{ $horario->hora_fin }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarHorario(@json($horario))'
                        >Editar</button>

                        <form method="POST" action="/horarios/{{ $horario->id }}" onsubmit="return confirm('¿Estás seguro de eliminar el horario de {{ $horario->dia }}?')">
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
        function editarHorario(horario) {
            const form = document.getElementById('horarioForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/horarios/${horario.id}`;
            methodInput.value = 'PUT';

            document.getElementById('dia').value = horario.dia ?? '';
            document.getElementById('hora_inicio').value = horario.hora_inicio ?? '';
            document.getElementById('hora_fin').value = horario.hora_fin ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('horarioForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/horarios';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>