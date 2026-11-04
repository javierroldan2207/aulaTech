<?php 
require __DIR__ . "/includes/queri.php";
require __DIR__ . "/includes/connection.php";

$categories = [
    "Periféricos",
    "Pantallas",
    "Imagen y sonido",
    "Almacenamiento",
    "Conectividad",
    "Redes",
    "Accesorios"
];


$article = [
    "name"        => "",
    "description" => "",
    "category"    => "",
    "price"       => "",
    "stock"       => ""
];

$errors = [];

$id = null;

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
if(isset($_POST["id"])){
    $id($_POST["id"]);
}

$isEdit = $id !== null;

if ($isEdit) {
    $pageTitle  = "Modificar artículo";
    $buttonText = "Guardar cambios";
} else {
    $pageTitle  = "Añadir artículo";
    $buttonText = "Añadir artículo";
}




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
            <h2 class="mb-4"><?php echo $pageTitle ?></h2>
            <!-- Único formulario: action vacío = se envía a este mismo fichero -->
            <form action="" method="post">
                <!-- Campo oculto con el id (se usará al modificar) -->
                 <?php if($isEdit){ ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">
                <?php } ?>
                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($article["name"]) ?>">
                </div>
                <!-- Descripción -->
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($article["description"]) ?></textarea>
                </div>
                <!-- Categoría -->
                <div class="form-group">
                    <label for="category">Categoría</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">-- Elige una categoría --</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo htmlspecialchars($category) ?>"
                                <?php if ($article["category"] === $category) { echo "selected"; } ?>>
                                <?php echo htmlspecialchars($category) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Precio -->
                <div class="form-group">
                    <label for="price">Precio (€)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="price" name="price">
                </div>
                <!-- Botones -->
                <button type="submit" class="btn btn-primary"><?php echo $buttonText ?></button>
                <a href="/AulaTech/index.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
require __DIR__ . "/includes/footer.php";
?>