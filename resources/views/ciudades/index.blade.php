<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Ciudades</title>
</head>
<body class="m-5">
    <h1>Ciudades</h1>

    <form id="ciudadForm" method="POST" action="/ciudades" class="container mt-4">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="ciudad_id">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" id="nombre" class="form-control" placeholder="Nombre de la ciudad" required>
        </div>

        <div class="mb-3">
            <label for="id_pais" class="form-label">ID País</label>
            <input name="id_pais" id="id_pais" type="number" class="form-control" placeholder="ID del país" required>
        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit" style="display: none;">Cancelar</button>
    </form>

    <div class="container mt-5">
        <h2>Listado de Ciudades</h2>

        <ul class="list-group">
            @foreach($ciudades as $ciudad)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $ciudad->nombre }}</strong>
                        | País: {{ $ciudad->id_pais }}
                    </span>

                    <div class="d-flex gap-2">
                        <button
                            class="btn btn-sm btn-warning"
                            onclick='editarCiudad(@json($ciudad))'
                        >Editar</button>

                        <form method="POST" action="/ciudades/{{ $ciudad->id }}" onsubmit="return confirm('¿Estás seguro de eliminar la ciudad {{ $ciudad->nombre }}?')">
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
        function editarCiudad(ciudad) {
            const form = document.getElementById('ciudadForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = `/ciudades/${ciudad.id}`;
            methodInput.value = 'PUT';

            document.getElementById('nombre').value = ciudad.nombre ?? '';
            document.getElementById('id_pais').value = ciudad.id_pais ?? '';

            submitButton.textContent = 'Actualizar';
            cancelEdit.style.display = 'inline-block';
        }

        document.getElementById('cancelEdit').addEventListener('click', () => {
            const form = document.getElementById('ciudadForm');
            const methodInput = document.getElementById('formMethod');
            const submitButton = document.getElementById('submitButton');
            const cancelEdit = document.getElementById('cancelEdit');

            form.action = '/ciudades';
            methodInput.value = 'POST';

            form.reset();

            submitButton.textContent = 'Crear';
            cancelEdit.style.display = 'none';
        });
    </script>
</body>
</html>