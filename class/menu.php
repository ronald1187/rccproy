<!--?php require_once('../config/conexion.php');?-->
<?php
session_start();
if(isset($_SESSION['nombredelusuario']))
{
$usuarioingresado = $_SESSION['nombredelusuario'];
	//echo "<h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location:../login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/imagenes/LogoESMAR.png">
    <title>Inicio</title>
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand"><img src="http://localhost:8080/Esmar/assets/Imagenes/LogoESMAR1.png" width="35" height="35"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    UTILIDADES
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="http://localhost:8080/Esmar/view/add_curso.php">Registrar Curso</a></li>
          <li><a class="dropdown-item" href="http://localhost:8080/Esmar/view/lista_curso.php">Lista Curso</a></li>
          <li><a class="dropdown-item" href="http://localhost:8080/Esmar/view/add_docente.php">Registrar Docente</a></li>
          <li><a class="dropdown-item" href="http://localhost:8080/Esmar/view/lista_docente.php">Lista Docente</a></li>
        </ul>

        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8080/Esmar/index.php" style="color:white;">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8080/Esmar/view/listaAdmision.php" style="color:white;">LISTA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8080/Esmar/view/formAdmision.php" style="color:white;">REGISTRAR</a>
        </li>
      </ul>
      <form class="d-flex nav-item dropdown bg-primary" method="POST">
          <a class="nav-link dropdown-toggle text-uppercase btn-sm" style="color:white;" href="#" role="button" data-bs-toggle="dropdown">
            <?php echo "$usuarioingresado"?></a>
          <ul class="dropdown-menu dropdown-menu-end bg-muted">
            <li><a class="dropdown-item"><button class="btn bg-transparent" type="submit" name="btncerrar" id="btncerrar">&#128682; Cerrar Sessión</Button></a></li>
            <li><a class="dropdown-item"><button class="btn bg-transparent" type="submit" name="" id="">&#128272; Cambiar Contraseña</button></a></li>
           
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
</form>
    </div>
  </div>
</nav>
<?php
if(isset($_POST['btncerrar']))
{
    session_destroy();
    header('location: http://localhost:8080/Esmar/login/login.php');
}
?>
</body>
</html>