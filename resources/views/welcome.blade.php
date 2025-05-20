<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold">Bienvenido a la Aplicación</h1>
            <p class="text-muted">Gestiona fácilmente tus sedes desde aquí</p>
        </div>

        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h5 class="card-title text-center mb-3">Módulos Disponibles</h5>

            <div class="d-grid gap-3 mb-3">
                <a href="/personas" class="btn btn-outline-primary btn-lg">
                    👥 Módulo de Personas
                </a>
            </div>

            <div class="d-grid gap-3 mb-3">
                <a href="/api/documentation" class="btn btn-outline-primary btn-lg">
                    🛠️ API Swagger
                </a>
            </div>
        </div>
    </div>
</body>
</html>