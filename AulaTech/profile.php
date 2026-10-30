<?php 
require __DIR__ . "/includes/header.php"; 
require __DIR__ . "/includes/connection.php";
require __DIR__ . "/includes/queri.php";

$id = (int) $_SESSION["userId"];
$userDetail = getUser($connection, $id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ficha de usuario</title>

    <!-- Bootstrap 4.1.3 por CDN -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Tarjeta con los datos del usuario -->
            <div class="card">
                <div class="card-header">
                    <h2 class="h4 mb-0">Datos del usuario</h2>
                </div>

                <!-- Lista con una fila por cada dato -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Id:</strong> 1
                    </li>
                    <li class="list-group-item">
                        <strong>Nombre de usuario:</strong> <?php echo $userDetail["name"] ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Nombre completo:</strong> Javier Roldán
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong> javier@email.com
                    </li>
                </ul>

                <div class="card-footer">
                    <a href="articles.php" class="btn btn-secondary">Volver</a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>

<?php require __DIR__ . "/includes/footer.php"; ?>