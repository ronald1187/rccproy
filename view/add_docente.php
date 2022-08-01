<?php
  require_once('../config/conexion.php');

//  session_start();
//  if(isset($_SESSION['nombredelusuario']))
//  {
//  $usuarioingresado = $_SESSION['nombredelusuario'];
//  }
//  else
//  {
//      header('location:../login/login.php');
//  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../Style/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Style/jquery-3.3.1.min.js"></script>
    <link rel="icon" href="../assets/imagenes/LogoESMAR.png">
    <title>Docente</title>
</head>
<body>
<?php require_once('../class/menu.php');?>
    <br>
    <h2 align="center">FORMULARIO ADICIONAR DOCENTE</h2>
    <br>
<form type="form" action="../class/class_docente.php" method="POST">
  <div class="container">
    <div class="row">
    <label class="col-form-label">NOMBRES Y APELLIDOS:</lavel>
      <div>
        <input name="docente" class="form-control" placeholder="Nombre Completo">
      </div>
      <label class="col-form-label">CI:</lavel>
      <div>
        <input onkeypress ="return numeros(this)" name="ci" class="form-control" placeholder="CI">
      </div>
    </div>

    <button name="btn_guardar"class="btn btn-primary btn-h-8 px-5 ml-4" style="margin: 15px">GUARDAR</button>
    <a href="lista_docente.php" class="btn btn-primary px-5">CANCELAR</a>
  </div>
</form>
</body>
</html>

<script type="text/javascript">
    function numeros(evt)
    {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
     return true;
    }
</script>