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
    <?php require_once('../class/menu.php');
        $no=$_GET['no'];
        $consulta=mysqli_query($conexion,"SELECT * FROM curso 
        WHERE id_curso='".$no."';");
          while($fila=mysqli_fetch_array($consulta)){
            $nombre_curso=$fila[1];
            $hora_desde=$fila[2];
            $hora_hasta=$fila[3];
            $estado=$fila[4];
            if($estado==1){
              $estado='ACTIVO';
            }
            else{
              $estado='INACTIVO';
            }
          }
    ?>
        <br>
        <h2 align="center">FORMULARIO MODIFICAR CURSO</h2><br>
<form type="form" action="../class/class_curso.php" method="POST">
<div class="container">

    <div class="row">
    <input type="hidden" value="<?php echo $no ?>" name="id_curso" id="id_curso">
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-3 col-xl-2 col-form-label">NOMBRE DEL CURSO:</label>
            <div class="col-xs-10 col-sm-12 col-md-12 col-lg-9 col-xl-10">
              <input value="<?php echo $nombre_curso ?>" type="text" name="curso" id="curso" class="form-control" placeholder="Nombre del Curso" required>
            </div>

        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-2 col-form-label"><h4>HORA:</h4></label>
        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-3 col-xl-2">
              <input value="<?php echo $hora_desde?>" name="hora_desde" id="hora_desde" type="time" class="form-control" required>
            </div>

        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Hasta:</label>
            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                <input value="<?php echo $hora_hasta?>" name="hora_hasta" id="hora_hasta" type="time" class="form-control" required>
            </div>

        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label"><h4>DÍAS:</h4></label>
        <br>
          <?php

          // LUNES
          $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
            WHERE dias.id_dias=curso_dias.N_dias
            AND curso.id_curso=curso_dias.N_curso
            AND dias.dias='LUNES'
            AND curso.id_curso='".$no."';");
            $lunes=0;
              while($fila=mysqli_fetch_array($consulta)){
                $lunes=$fila[0];
              }  
          if($lunes=='LUNES')
          {?>
            <div class='form-check col'>
              <input type='checkbox' class='form-check-input' id='lunes' name='lunes' value='something' checked>
              <label class='form-check-label' for='check1'>LUNES</label>
            </div>
          <?php
          }
          else{
          ?>
            <div class='form-check col'>
              <input type='checkbox' class='form-check-input' id='lunes' name='lunes' value='something'>
              <label class='form-check-label' for='check1'>LUNES</label>
            </div>
          <?php
          }
          //echo "<input type='hidden' class='form-check-input' id='lunes' name='lunes' value='something'>";
         // MARTES 
         $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
         WHERE dias.id_dias=curso_dias.N_dias
         AND curso.id_curso=curso_dias.N_curso
         AND dias.dias='MARTES'
         AND curso.id_curso='".$no."';");
         $martes=0;
           while($fila=mysqli_fetch_array($consulta)){
             $martes=$fila[0];
           }  
          if($martes=='MARTES')
          {
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='martes' value='something' checked>";
            echo"  <label class='form-check-label' for='check1'>MARTES</label>";
            echo"</div>";
          }
          else{
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='martes' value='something'>";
            echo"  <label class='form-check-label' for='check1'>MARTES</label>";
            echo"</div>";
          }

      //MIERCOLES
      $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
            WHERE dias.id_dias=curso_dias.N_dias
            AND curso.id_curso=curso_dias.N_curso
            AND dias.dias='MIERCOLES'
            AND curso.id_curso='".$no."';");
            $miercoles=0;
              while($fila=mysqli_fetch_array($consulta)){
                $miercoles=$fila[0];
              }  
          if($miercoles=='MIERCOLES')
          {
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='miercoles' value='something' checked>";
            echo"  <label class='form-check-label' for='check1'>MIERCOLES</label>";
            echo"</div>";
          }
          else{
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='miercoles' value='something'>";
            echo"  <label class='form-check-label' for='check1'>MIERCOLES</label>";
            echo"</div>";
          }

          //JUEVES
          $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
            WHERE dias.id_dias=curso_dias.N_dias
            AND curso.id_curso=curso_dias.N_curso
            AND dias.dias='JUEVES'
            AND curso.id_curso='".$no."';");
            $jueves=0;
              while($fila=mysqli_fetch_array($consulta)){
                $jueves=$fila[0];
              }  
          if($jueves=='JUEVES')
          {
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='jueves' value='something' checked>";
            echo"  <label class='form-check-label' for='check1'>JUEVES</label>";
            echo"</div>";
          }
          else{
            echo"<div class='form-check col'>";
            echo"  <input type='checkbox' class='form-check-input' id='check1' name='jueves' value='something'>";
            echo"  <label class='form-check-label' for='check1'>JUEVES</label>";
            echo"</div>";
          }

          //VIERNES
          $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
          WHERE dias.id_dias=curso_dias.N_dias
          AND curso.id_curso=curso_dias.N_curso
          AND dias.dias='VIERNES'
          AND curso.id_curso='".$no."';");
          $viernes=0;
            while($fila=mysqli_fetch_array($consulta)){
              $viernes=$fila[0];
            }  
        if($viernes=='VIERNES')
        {
          echo"<div class='form-check col'>";
          echo"  <input type='checkbox' class='form-check-input' id='check1' name='viernes' value='something' checked>";
          echo"  <label class='form-check-label' for='check1'>VIERNES</label>";
          echo"</div>";
        }
        else{
          echo"<div class='form-check col'>";
          echo"  <input type='checkbox' class='form-check-input' id='check1' name='viernes' value='something'>";
          echo"  <label class='form-check-label' for='check1'>VIERNES</label>";
          echo"</div>";
        }

        //SABADO
        $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
        WHERE dias.id_dias=curso_dias.N_dias
        AND curso.id_curso=curso_dias.N_curso
        AND dias.dias='SABADO'
        AND curso.id_curso='".$no."';");
        $sabado=0;
          while($fila=mysqli_fetch_array($consulta)){
            $sabado=$fila[0];
          }  
      if($sabado=='SABADO')
      {
        echo"<div class='form-check col'>";
        echo"  <input type='checkbox' class='form-check-input' id='check1' name='sabado' value='something' checked>";
        echo"  <label class='form-check-label' for='check1'>SABADO</label>";
        echo"</div>";
      }
      else{
        echo"<div class='form-check col'>";
        echo"  <input type='checkbox' class='form-check-input' id='check1' name='sabado' value='something'>";
        echo"  <label class='form-check-label' for='check1'>SABADO</label>";
        echo"</div>";
      }
      
      //DOMINGO
      $consulta=mysqli_query($conexion,"SELECT dias.dias FROM dias, curso_dias, curso
      WHERE dias.id_dias=curso_dias.N_dias
      AND curso.id_curso=curso_dias.N_curso
      AND dias.dias='DOMINGO'
      AND curso.id_curso='".$no."';");
      $domingo=0;
        while($fila=mysqli_fetch_array($consulta)){
          $domingo=$fila[0];
        }  
    if($domingo=='DOMINGO')
    {
      echo"<div class='form-check col'>";
      echo"  <input type='checkbox' class='form-check-input' id='check1' name='domingo' value='something' checked>";
      echo"  <label class='form-check-label' for='check1'>DOMINGO</label>";
      echo"</div>";
    }
    else{
      echo"<div class='form-check col'>";
      echo"  <input type='checkbox' class='form-check-input' id='check1' name='domingo' value='something'>";
      echo"  <label class='form-check-label' for='check1'>DOMINGO</label>";
      echo"</div>";
    } 
          ?>
          <label class="col-sm-12 col-md-0 col-lg-12 col-xl-12 col-form-label"></label>
        <label class="col-sm-2 col-md-1 col-lg-1 col-xl-1 col-form-label">Estado:</label>
          <div class = "col-sm-6 col-md-4 col-lg-3 col-xl-3 col-form-label">    
            <select name="estado" id="estado" type="text" class="form-control form-select" >
              <option value="0"><?php echo $estado?></option> 
              <option value="1"><?php echo "ACTIVO"?></option>
              <option value="2"><?php echo "INACTIVO"?></option>
            </select>
          </div>
    </div><br>

    <button name="btn_editar"class="btn btn-primary btn-h-8 px-5 ml-4" style="margin: 15px">GRABAR</button>
    <a href="lista_docente.php" class="btn btn-primary px-5">CANCELAR</a>
</div>
</form>
</body>
</html>
