<?php 
require __DIR__ . "/includes/header.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de artículo</title>

    <!-- Bootstrap 4.1.3 por CDN -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Artículo</h2>

            <!-- Único formulario: action vacío = se envía a este mismo fichero -->
            <form action="" method="post">

                <!-- Campo oculto con el id (se usará al modificar) -->
                <input type="hidden" name="id" value="">

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <!-- Descripción -->
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <!-- Precio -->
                <div class="form-group">
                    <label for="price">Precio (€)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="price" name="price">
                </div>

                <!-- Botones -->
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="articles.php" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
<?php
require __DIR__ . "/includes/footer.php";
?>