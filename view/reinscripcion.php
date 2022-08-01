<?php
require_once ('../config/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="../assets/imagenes/LogoESMAR.png">
    <title>Modificar</title>
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <?php 
    require_once('../class/menu.php');
    $no=$_GET['no'];
    
    //$consulta=mysqli_query($conexion,"SELECT * FROM alumno, dias, docente,horario,sexo WHERE alumno.N_docente=docente.id_docente AND alumno.N_dias=dias.id_dias AND alumno.N_horario=horario.id_horario AND alumno.N_sexo=sexo.id_sexo AND docente.N_dias=dias.id_dias AND id_alumno='".$no."';");
    $consulta=mysqli_query($conexion,"SELECT * FROM alumno WHERE id_alumno='".$no."';");
    while($fila=mysqli_fetch_array($consulta)){
      $num_inscrito=$fila[1];
      $num_recibo=$fila[2];
      $nombre=$fila[3];
      $ap_paterno=$fila[4];
      $ap_materno=$fila[5];
      $edad=$fila[6];
      $fecha_nacimiento=$fila[7];
      $fecha_inicio=$fila[8];
      $carnet=$fila[9];
      $celular=$fila[10];
      $direccion=$fila[11];
      $nombre_parentesco=$fila[12];
      $apellidopat_parentesco=$fila[13];
      $apellidomat_parentesco=$fila[14];
      $celular_parentesco=$fila[15];
      $nombre_docente=$fila[16];
      $dias=$fila[17];
      $horario=$fila[18];
      $sexo=$fila[19];
    }
    //INSERT INTO `docente` (`id_docente`, `nombre`, `apellido`, `turno`, `N_dias`) VALUES (NULL, 'HENRY', 'MAMANI', 'NOCHE', '1'), (NULL, 'RONALD', 'CONDORI', 'TARDE', '2');
    
    ?>

<h2>el número es <?php echo $no ?></h2>
<?php $fechaActual = date("Y-m-d");?>
<h2 align="center">FORMULARIO DE REINSCRIPCION</h2><br>

<!--form type="form" action="formAdmisionpdf.php" method="post" target="print_popup"-->

<form type="form" action="../assets/download/formAdmisionpdf.php" method="post">

    <div class="container">
      <div class="row">
        
      <input value="<?php echo $no;?>" type="hidden" name="no" id="no">  
      <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">FECHA DE INICIO:</label>
          <div class="col-xs-10 col-sm-8 col-md-4 col-lg-5 col-xl-6"> 
          <input value="<?php echo $fechaActual;?>" name="fecha" id="fecha" type="date" class="form-control" placeholder="Fecha de Inicio">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Recibo:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input value="<?php echo $num_recibo;?>" ype="text" name="nro_recibo" id="nro_recibo" class="form-control" placeholder="Nro">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PROFESOR:</label>
          <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5 col-xl-6">
          <select name="profesor" id="profesor" class="form-control">
            <?php $nombre_docente1=mysqli_query($conexion,"SELECT nombre_docente, apellido FROM docente WHERE id_docente='".$nombre_docente."'");
                while($nombre_docente2=mysqli_fetch_array($nombre_docente1)){
                    $nombre_docente3=$nombre_docente2['nombre_docente'];
                    $nombre_docente4=$nombre_docente2['apellido'];
                }   
            ?> 
            <option><?php echo $nombre_docente3." ".$nombre_docente4?></option> 
            <?php $query="SELECT * FROM docente ORDER BY docente.id_docente";
                $respuesta=mysqli_query($conexion,$query);	//ejecuta la consulta query 
            ?>
            <?php foreach ($respuesta as $opciones):?>
            <option value="<?php echo $opciones['nombre_docente']?>"><?php echo $opciones['nombre_docente']." ".$opciones['apellido']?></option>           
            <?php endforeach ?>
          </select>
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Inscrito:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input readonly="readonly" value="<?php echo $num_inscrito;?>" name="nro_inscrito" id="nro_inscrito" type="text" class="form-control" placeholder="Nro">
          </div>
      </div>
      <br>
  
      <h4>DATOS DEL ALUMNO</h4>
      <div class="row">
        
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">NOMBRE:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $nombre;?>" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombres">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">AP. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $ap_paterno;?>" name="ap_paterno" id="ap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $ap_materno;?>" name="ap_materno" id="ap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">EDAD</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $edad;?>" name="edad" id="edad" type="text" class="form-control" placeholder="Edad">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-form-label">FECHA DE NACIMIENTO:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3 col-xl-3">
          <input readonly="readonly" value="<?php echo $fecha_nacimiento;?>" name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" placeholder="Fecha de Nacimiento">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">CI:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-4 col-xl-4">
          <input value="<?php echo $carnet;?>" name="ci" id="ci" type="text" class="form-control" placeholder="Nro de Carnet">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-2 col-lg-4 col-xl-4">
          <input value="<?php echo $celular;?>" name="nro_celular" id="nro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">DIRECCION:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <input value="<?php echo $direccion;?>" name="direccion" id="direccion" type="text" class="form-control" placeholder="Direccion">
          </div>

        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">SEXO:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <select name="sexo" id="sexo" class="form-control">
            <?php $sexo1=mysqli_query($conexion,"SELECT sexo FROM sexo WHERE id_sexo='".$sexo."'");
                while($sexo2=mysqli_fetch_array($sexo1)){
                    $sexo3=$sexo2['sexo'];
                }   
            ?> 
            <option><?php echo $sexo3?></option>
            <?php $query="SELECT * FROM sexo ORDER BY sexo.id_sexo";
                $respuesta=mysqli_query($conexion,$query);	//ejecuta la consulta query 
            ?>
            <?php foreach ($respuesta as $opciones):?>
            <option value="<?php echo $opciones['sexo']?>"><?php echo $opciones['sexo']?></option>           
            <?php endforeach ?>
          </select>
          </div><br>

      </div>
      <br>
  
      <h4>REFERENCIA FAMILIAR</h4>
  
      <div class="row">
          
        <!--label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PARENTESCO:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="" name="parentesco" id="parentesco" type="text" class="form-control" placeholder="Parentesco">
          </div-->
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">NOMBRE:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $nombre_parentesco;?>" name="refnombre" id="refnombre" type="text" class="form-control" placeholder="Nombre">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $apellidopat_parentesco;?>" name="refap_paterno" id="refap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $apellidomat_parentesco;?>" name="refap_materno" id="refap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $celular_parentesco;?>" name="refnro_celular" id="refnro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
      </div>
      <br>

      <h4>REFERENCIA HORARIA Y FRECUENCIA SEMANAL</h4>       
      <div class="row">
          
        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">DIA:</label>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-5 col-xl-5">
          <select name="dia" id="dia" class="form-control">
            <?php $dias1=mysqli_query($conexion,"SELECT dias FROM dias WHERE id_dias='".$dias."'");
                while($dias2=mysqli_fetch_array($dias1)){
                    $dias3=$dias2['dias'];
                }   
            ?> 
            <option><?php echo $dias3?></option>
            <?php $query="SELECT * FROM dias ORDER BY dias.id_dias";
                $respuesta=mysqli_query($conexion,$query);	//ejecuta la consulta query 
            ?>
            <?php foreach ($respuesta as $opciones):?>
            <option value="<?php echo $opciones['dias']?>"><?php echo $opciones['dias']?></option>           
            <?php endforeach ?>
          </select>
              <!--option>Lunes</option>
              <option>Martes-miercoles-jueves</option>
              <option>Miercoles</option>
              <option>Jueves</option>
              <option>Viernes</option>
              <option>Sábado</option>
              <option>Domingo</optio>
          </select-->
        </div>
            
        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
        <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
            <?php $horario_desde1=mysqli_query($conexion,"SELECT horario_desde FROM horario WHERE id_horario='".$horario."'");
                while($horario_desde2=mysqli_fetch_array($horario_desde1)){
                    $horario_desde3=$horario_desde2['horario_desde'];
                }   
            ?>
            <input value="<?php echo $horario_desde3;?>" name="hora_desde" id="hora_desde" type="time" class="form-control">
        </div>

        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Hasta:</label>
        <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
            <?php $horario_hasta1=mysqli_query($conexion,"SELECT horario_hasta FROM horario WHERE id_horario='".$horario."'");
                while($horario_hasta2=mysqli_fetch_array($horario_hasta1)){
                    $horario_hasta3=$horario_hasta2['horario_hasta'];
                }   
            ?> 
          <input value="<?php echo $horario_hasta3;?>" name="hora_hasta" id="hora_hasta" type="time" class="form-control">
        </div>  
      </div>
      <br>
      <button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_guardar_edicion" name="btn_guardar_edicion" onclick="this.form.action='../class/editar.php'">Guardar</button>
      <button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_guardar" name="btn_guardar" onclick="this.form.action='listaAdmision.php'">Cancelar</button>
      <input name="pdf" type="image" src="../assets/Imagenes/Exportar_a_Pdf.png" style="width:65px" align="right">
      <!--a href="formAdmisionpdf.php"> <img src="assets/Imagenes/Exportar_a_Pdf.png" alt="logo" style="width:55px" align="right">
</a-->
    </div><br><br>
          <!--a (click)="createPdf()"-->
          
          <!--a type="submit" ><img src="assets/Imagenes/Exportar_a_Pdf.png" alt="logo" style="width:50px" align="right"></a-->
                      
          <!--button (click)="downloadPDF()">pdf</button-->
          <!--div id="content" #content></div>
        </div-->
        
   <!--input type="submit" value="hola" -->
    <!--p><input type="image" src="assets/Imagenes/Exportar_a_Pdf.png" style="width:55px" align="right"></p-->

  </form>


<?php

if(isset($_POST["pdf"]))
{
    {     $nro_recibo=$_POST["sexo"];

      echo"<script type='text/javascript'>
        window.location.href='http://localhost:8080/Esmar/formAdmisionpdf.php';
      //window.location='http://localhost:8080/Esmar/formAdmisionpdf.php';
          </script>";
    }

    echo $nro_recibo;
    return;
    
}
//include ('class/insertar.php');

?>



</body>
</html>