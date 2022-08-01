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
<?php require_once('../class/menu.php');
    $no=$_GET['no'];
    $consulta=mysqli_query($conexion,"SELECT * FROM docente
    WHERE docente.id_docente='".$no."';");
      while($fila=mysqli_fetch_array($consulta)){
        $nombre_docente=$fila[1];
        $ci_docente=$fila[2];
      }
?>
    <br>
    <h2 align="center">FORMULARIO EDITAR DOCENTE</h2>
    <br>
<form type="form" action="../class/class_docente.php" method="POST">
  <div class="container">
    <div class="row">
    <input type="hidden" value="<?php echo $no; ?>" name="id_docente">
    <label class="col-form-label">NOMBRES Y APELLIDOS:</lavel>
      <div>
        <input value="<?php echo $nombre_docente; ?>" name="docente" class="form-control" placeholder="Nombre Completo">
      </div>
      <label class="col-form-label">CI:</lavel>
      <div>
        <input value="<?php echo $ci_docente; ?>" onkeypress ="return numeros(this)" name="ci" class="form-control" placeholder="CI">
      </div>
    </div>
    
    <button name="btn_editar" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" style="margin: 15px">GRABAR</button>
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