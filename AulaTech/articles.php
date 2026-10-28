<?php  
require __DIR__ . '/includes/connection.php';
require __DIR__ . '/includes/queri.php';

$articles = getArticles($connection);

require __DIR__ . '/includes/header.php';
?>

<h1 class="h3 mb-4">Artículos</h1>

<div class="table-responsive">
  <table class="table table-striped table-hover">

    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th class="text-right">Precio</th>
        <th class="text-right">Existencias</th>
        <th>Info</th>
      </tr>
    </thead>

    <tbody>
      <!-- Aquí irá una fila <tr> por cada artículo. Esta es de ejemplo: -->
        <?php foreach($articles as $article){ ?>
      <tr>
        <td><?php echo $article["id"] ?></td>
        <td><?php echo $article["name"] ?></td>
        <td><?php echo $article["category"] ?></td>
        <td><?php echo number_format($article["price"], 2, ",", ".") ?>€</td>
        <td><?php echo $article["stock"] ?></td>
        <td><a href="detail.php?id=<?php echo $article["id"]?>" class="btn btn-sm btn-outline-primary">Detalles</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php require __DIR__ . '/includes/footer.php' ?>