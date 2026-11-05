<?php
require __DIR__ . "/includes/queri.php";
require __DIR__ . "/includes/connection.php";


const NAMELENTGH = 120;
const DESCRIPTIONLENGTH = 60000;
const MAXSTOCK = 100000;
const MAXPRICE = 100000;

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

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

$isEdit = $id !== null;

if ($isEdit) {

    $id = (int) $id;

    if ($id < 1) {
        header("Location: articles.php");
    } else {
        $dbArticle = getArticleById($connection, $id);

        if ($dbArticle === false) {
            header("Location: articles.php");
        } elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
            $article = $dbArticle;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $article["name"]        = trim($_POST["name"] ?? "");
    $article["description"] = trim($_POST["description"] ?? "");
    $article["category"]    = $_POST["category"] ?? "";
    $article["price"]       = trim($_POST["price"] ?? "");
    $article["stock"]       = trim($_POST["stock"] ?? "");

   
    
    if(($article["name"]) === ""){
        $errors["name"] = "El nombre es obligatorio";
    }elseif(strlen($article["name"]) > NAMELENTGH){
        $errors["name"] = "El nombre es demasiado largo.";
    }

    if($article["description"] === ""){
        $errors["description"] = "La descripcion es obligatoria";
    }elseif(strlen($article["description"]) > DESCRIPTIONLENGTH){
        $errors["description"] = "La descripcion es demasiado larga.";
    }

    if((int) $article["stock"] <= 0){
        $errors["stock"] = "Cantidad de stock erronea.";
    }elseif((int) $article["stock"] > MAXSTOCK){
        $errors["stock"] = "Cantidad de articulos incorrectas.";
    }
    if((int) $article["price"] <= 0){
        $errors["price"] = "Precio erroneo.";
    }elseif(!is_numeric($article["price"])){
        $errors["price"] = "El precio tiene que ser un numeo.";
    }elseif((int) $article["price"] > MAXPRICE){
        $errors["price"] = "precio demasiado grnade.";
    }

    if($article["category"] === ""){
        $errors["category"] = "La categoria es obligatoria.";
    }

    
}



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
            <form action="" method="post">
                <?php if ($isEdit) { ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id) ?>">
                <?php } ?>
                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?php echo htmlspecialchars($article["name"]) ?>">
                    <?php if (isset($errors["name"])) { ?>
                    <div class="text-danger small"><?php echo htmlspecialchars($errors["name"]) ?></div>
                    <?php } ?>
                </div>
                <!-- Descripción -->
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3"><?php echo htmlspecialchars($article["description"]) ?></textarea>
                    <?php if (isset($errors["description"])) { ?>
                    <div class="text-danger small"><?php echo htmlspecialchars($errors["description"]) ?></div>
                    <?php } ?>
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
                    <?php if (isset($errors["category"])) { ?>
                    <div class="text-danger small"><?php echo htmlspecialchars($errors["category"]) ?></div>
                    <?php } ?>
                </div>
                <!-- Precio -->
                <div class="form-group">
                    <label for="price">Precio (€)</label>
                    <input type="text" class="form-control" id="price" name="price"
                           value="<?php echo htmlspecialchars($article["price"]) ?>">
                    <?php if (isset($errors["price"])) { ?>
                    <div class="text-danger small"><?php echo htmlspecialchars($errors["price"]) ?></div>
                    <?php } ?>
                </div>
                <!-- Existencias -->
                <div class="form-group">
                    <label for="stock">Existencias</label>
                    <input type="text" class="form-control" id="stock" name="stock"
                           value="<?php echo htmlspecialchars($article["stock"]) ?>">
                    <?php if (isset($errors["stock"])) { ?>
                    <div class="text-danger small"><?php echo htmlspecialchars($errors["stock"]) ?></div>
                    <?php } ?>
                </div>
                <!-- Botones -->
                <button type="submit" class="btn btn-primary"><?php echo $buttonText ?></button>
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