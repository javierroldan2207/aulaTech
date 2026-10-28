<?php session_start();
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/connection.php';
require __DIR__ . '/includes/queri.php';


$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["username"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $pass = $_POST["password"];

    $user = getUser($connection, $username);

    if($user != null && password_verify($pass, $user["password"])){
    
      $_SESSION["userId"] = $user["id"];
      $_SESSION["role"] = $user["role"];

      echo "<script>window.location.href = 'index.php';</script>";
    }else{
      $error = "Credenciales incorrectas.";
    }
  }
  
}

 ?>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">

    <h1 class="h3 mb-4 text-center">Iniciar sesión</h1>

    <form action="login.php" method="post">

      <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" id="username" name="username"
               maxlength="30" required autofocus>
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password"
               required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </form>

  </div>
</div>
<?php require __DIR__ . '/includes/footer.php' ?>