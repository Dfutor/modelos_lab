<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Paises</title>
</head>
<body class="m-5">
    <h1>Paises</h1>

    <form id="paisForm" method="POST" action="/paises" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="pais_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre del país" required>
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input name="codigo" id="codigo" class="form-control" placeholder="Código (ej: CO, AR, US)">
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Paises</h2>

        <ul class="list-group">
            @foreach($paises as $pais)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $pais->nombre }}</strong>
                        | Código: {{ $pais->codigo }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarPais(@json($pais))'
                        >Editar</button>

                        <form method="POST" action="/paises/{{ $pais->id }}" onsubmit="return confirm('¿Estás seguro de eliminar el país {{ $pais->nombre }}?')">
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
        function editarPais(pais) {
            const form = document.getElementById('paisForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/paises/${pais.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = pais.nombre ?? '';
            document.getElementById('codigo').value = pais.codigo ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('paisForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/paises';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>