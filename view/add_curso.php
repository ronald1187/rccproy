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
    <title>Curso</title>
</head>
<body>
    <?php require_once('../class/menu.php');?>
        <br>
        <h2 align="center">FORMULARIO ADICIONAR CURSO</h2><br>
<form type="form" action="../class/class_curso.php" method="POST">
<div class="container">

    <div class="row">
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-form-label">NOMBRE DEL CURSO:</label>
            <div class="col-xs-10 col-sm-12 col-md-12 col-lg-9 col-xl-10">
              <input type="text" name="curso" id="curso" class="form-control" placeholder="Nombre del Curso" required>
            </div>

        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 col-form-label"><h4>HORA:</h4></label>
        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-3 col-xl-2">
              <input name="hora_desde" id="hora_desde" type="time" class="form-control" required>
            </div>

        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Hasta:</label>
            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                <input name="hora_hasta" id="hora_hasta" type="time" class="form-control" required>
            </div>

        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label"><h4>DÍAS:</h4></label>
        <br>
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" id="check1" name="lunes" value="something">
              <label class="form-check-label" for="check1">LUNES</label>
            </div>
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="martes" value="something">
              <label class="form-check-label" for="check2">MARTES</label>
            </div>
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="miercoles" value="something">
              <label class="form-check-label" for="check2">MIERCOLES</label>
            </div>  
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="jueves" value="something">
              <label class="form-check-label" for="check2">JUEVES</label>
            </div>  
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="viernes" value="something">
              <label class="form-check-label" for="check2">VIERNES</label>
            </div>
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="sabado" value="something">
              <label class="form-check-label" for="check2">SÁBADO</label>
            </div>  
            <div class="form-check col">
              <input type="checkbox" class="form-check-input" name="domingo" value="something">
              <label class="form-check-label" for="check2">DOMINGO</label>
            </div>    
    </div>

    <button name="btn_guardar"class="btn btn-primary btn-h-8 px-5 ml-4" style="margin: 15px">GUARDAR</button>
    <a href="lista_docente.php" class="btn btn-primary px-5">CANCELAR</a>
</div>
</form>
</body>
</html>
