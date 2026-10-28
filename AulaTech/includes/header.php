<?php session_start()?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AulaTech</title>

  <!-- Bootstrap 4 (CSS) -->
  <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

      <a class="navbar-brand font-weight-bold" href="index.php">AulaTech</a>

      <!-- Botón de hamburguesa (solo se ve en móvil) -->
      <button class="navbar-toggler" type="button"
              data-toggle="collapse" data-target="#mainMenu"
              aria-controls="mainMenu" aria-expanded="false"
              aria-label="Abrir menú">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainMenu">

        <ul class="navbar-nav mr-auto">
          <!-- Opciones para todos los usuarios -->
          <li class="nav-item">
            <a class="nav-link" href="articles.php">Ver artículos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Ver mis datos</a>
          </li>

          <!-- Opciones solo para administradores -->
           <?php if($_SESSION["role"] == "admin"){ ?>
          <li class="nav-item">
            <a class="nav-link" href="articleForm.php">Añadir artículo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Gestionar usuarios</a>
          </li>
          <?php } ?>
        </ul>
        <?php if(!isset($_SESSION["userId"])){ ?>
        <form action="login.php" method="post" name="login" class="form-inline my-2 my-lg-0">
          <button type="submit" class="btn btn-outline-light">Iniciar sesion</button>
        </form>
        <?php }else{ ?>
         <button type="submit" name="logout" class="btn btn-outline-light"> Cerrar Sesion</button>
        <?php }?>
      </div>
    </div>
  </nav>
</header>
<main class="container mt-4">