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
  $consulta=mysqli_query($conexion,"SELECT * FROM admision, alumno, pariente, docente, curso, recibo
  WHERE alumno.id_alumno=admision.N_alumno
  AND pariente.id_pariente=admision.N_pariente
  AND docente.id_docente=admision.N_docente
  AND curso.id_curso=admision.N_curso
  AND recibo.N_admision=admision.id_admision
  
  AND admision.id_admision='".$no."';");
    while($fila=mysqli_fetch_array($consulta)){
      $id_alumno=$fila[6];
      $num_recibo=$fila[30];
      $nombre=$fila[7];
      $ap_paterno=$fila[8];
      $ap_materno=$fila[9];
      $edad=$fila[10];
      $fecha_nacimiento=$fila[11];
      $carnet=$fila[12];
      $celular=$fila[13];
      $direccion=$fila[14];
      $nombre_curso=$fila[26];
      $hora_desde=$fila[27];
      $hora_hasta=$fila[28];
      $nombre_docente=$fila[23];
      $sexo=$fila[15];

      $nombre_pariente=$fila[18];
      $apellidopat_pariente=$fila[19];
      $apellidomat_pariente=$fila[20];
      $celular_pariente=$fila[21];
      $id_curso=$fila[25];
      $fecha_inicio=$fila[1];
    }

//DIAS
  $consulta1=mysqli_query($conexion,"SELECT GROUP_CONCAT(' ',dias.dias) FROM curso_dias, curso, dias 
  WHERE curso_dias.N_dias=dias.id_dias 
  AND curso_dias.N_curso=curso.id_curso 
  AND curso_dias.N_curso='".$id_curso."';");
    while($fila1=mysqli_fetch_array($consulta1)){
      $dias=$fila1[0];
//      $num_recibo=$fila[2];
//      $nombre=$fila[3];
//      $ap_paterno=$fila[4];
//      $ap_materno=$fila[5];
//      $edad=$fila[6];
//      $fecha_nacimiento=$fila[7];
//      $fecha_inicio=$fila[8];
//      $carnet=$fila[9];
//      $celular=$fila[10];
//      $direccion=$fila[11];
//      //$nombre_parentesco=$fila[12];
//      //$apellidopat_parentesco=$fila[13];
//      //$apellidomat_parentesco=$fila[14];
//      //$celular_parentesco=$fila[15];
//      //$nombre_docente=$fila[16];
//      //$dias=$fila[17];
//      //$horario=$fila[18];
//      //$sexo=$fila[19];
    }


    //INSERT INTO `docente` (`id_docente`, `nombre`, `apellido`, `turno`, `N_dias`) VALUES (NULL, 'HENRY', 'MAMANI', 'NOCHE', '1'), (NULL, 'RONALD', 'CONDORI', 'TARDE', '2');
    
    ?>
<br>
<h2 align="center">DATOS DE INSCRITO</h2><br>

<!--?php $fcha = date("Y-m-d");?-->
<!--form type="form" action="formAdmisionpdf.php" method="post" target="print_popup"-->

<form type="form" action="../assets/download/formAdmisionpdf.php" method="post" target="print_popup">

    <div class="container">
      <div class="row">
        
      <input value="<?php echo $no;?>" type="hidden" name="no" id="no">  
      <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">FECHA DE INICIO:</label>
          <div class="col-xs-10 col-sm-8 col-md-4 col-lg-5 col-xl-6"> 
          <input readonly="readonly" value="<?php echo $fecha_inicio;?>" name="fecha" id="fecha" type="date" class="form-control" placeholder="Fecha de Inicio">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Recibo:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input readonly="readonly" value="<?php echo $num_recibo;?>" type="text" name="recibo" id="recibo" class="form-control" placeholder="Nro">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PROFESOR:</label>
          <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5 col-xl-6">
          <select readonly="readonly" name="docente" id="docente" class="form-control">
              <!--option value=""><!?php echo strtoupper($nombre_docente)?></option-->
              <option value="0"><?php echo strtoupper($nombre_docente)?></option>
          </select>
          <input type="hidden" readonly="readonly" value="<?php echo $nombre_docente;?>" type="text" name="profesor" id="profesor" class="form-control" placeholder="Nro">
          
            <!--?php $nombre_docente1=mysqli_query($conexion,"SELECT nombre_docente, apellido FROM docente WHERE id_docente='".$nombre_docente."'");
                while($nombre_docente2=mysqli_fetch_array($nombre_docente1)){
                    $nombre_docente3=$nombre_docente2['nombre_docente'];
                    $nombre_docente4=$nombre_docente2['apellido'];
                }   
            ?--> 
          <!--input readonly="readonly" value="<!?php echo $nombre_docente3." ".$nombre_docente4;?>" class="form-control" name="profesor" id="profesor"-->
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Inscrito:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input readonly="readonly" value="<?php echo $id_alumno;?>" name="nro_inscrito" id="nro_inscrito" type="text" class="form-control" placeholder="Nro">
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
          <input readonly="readonly" value="<?php echo $carnet;?>" name="ci" id="ci" type="text" class="form-control" placeholder="Nro de Carnet">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-2 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $celular;?>" name="nro_celular" id="nro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">DIRECCION:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $direccion;?>" name="direccion" id="direccion" type="text" class="form-control" placeholder="Direccion">
          </div>

        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">SEXO:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <?php $sexo1=mysqli_query($conexion,"SELECT sexo FROM sexo WHERE id_sexo='".$sexo."'");
                while($sexo2=mysqli_fetch_array($sexo1)){
                    $sexo3=$sexo2['sexo'];
                }   
            ?> 
          <input readonly="readonly" value="<?php echo $sexo3;?>" class="form-control" name="sexo" id="sexo">
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
          <input readonly="readonly" value="<?php echo $nombre_pariente;?>" name="refnombre" id="refnombre" type="text" class="form-control" placeholder="Nombre">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $apellidopat_pariente;?>" name="refap_paterno" id="refap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $apellidomat_pariente;?>" name="refap_materno" id="refap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input readonly="readonly" value="<?php echo $celular_pariente;?>" name="refnro_celular" id="refnro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
      </div>
      <br>

      <h4>REFERENCIA HORARIA Y FRECUENCIA SEMANAL</h4>       
      <div class="row">
        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">CURSO:</label>
          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-11 col-xl-11">
            <input readonly="readonly" value="<?php echo $nombre_curso;?>" name="curso" id="curso" type="text" class="form-control" placeholder="Edad">
          </div>
        <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">DIAS:</label>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-5 col-xl-5">
            <!--?php $dias1=mysqli_query($conexion,"SELECT dias FROM dias WHERE id_dias='".$dias."'");
                while($dias2=mysqli_fetch_array($dias1)){
                    $dias3=$dias2['dias'];
                }   
            ?--> 
            <input readonly="readonly" value="<?php echo $dias;?>" class="form-control" name="dias" id="dias">
        </div>
            
        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
        <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
            <!--?php $horario_desde1=mysqli_query($conexion,"SELECT horario_desde FROM horario WHERE id_horario='".$horario."'");
                while($horario_desde2=mysqli_fetch_array($horario_desde1)){
                    $horario_desde3=$horario_desde2['horario_desde'];
                }   
            ?-->
            <input  readonly="readonly" value="<?php echo $hora_desde;?>" name="hora_desde" id="hora_desde" type="time" class="form-control">
        </div>

        <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Hasta:</label>
        <div class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
            <!--?php $horario_hasta1=mysqli_query($conexion,"SELECT horario_hasta FROM horario WHERE id_horario='".$horario."'");
                while($horario_hasta2=mysqli_fetch_array($horario_hasta1)){
                    $horario_hasta3=$horario_hasta2['horario_hasta'];
                }   
            ?--> 
          <input  readonly="readonly" value="<?php echo $hora_hasta;?>" name="hora_hasta" id="hora_hasta" type="time" class="form-control">
        </div>  
      </div>
      <br>
      <!--button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_guardar_edicion" name="btn_guardar_edicion" onclick="this.form.action='../class/editar.php'">Guardar</button-->
      <!--button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="Lista" name="Lista" onclick="this.form.action='listaAdmision.php'">Lista</button-->
      <!--input name="pdf" type="image" src="../assets/Imagenes/Exportar_a_Pdf.png" style="width:65px" align="right"-->
      <!--a href="formAdmisionpdf.php"> <img src="assets/Imagenes/Exportar_a_Pdf.png" alt="logo" style="width:55px" align="right">
      
</a-->
<a href="listaAdmision.php" class="btn btn-primary btn-h-8 px-5 ml-4">Lista Inscritos</a>
<input name="pdf" type="image" src="../assets/Imagenes/Exportar_a_Pdf.png" style="width:65px" align="right" onclick="this.form.action='../assets/download/formAdmisionpdf.php'">
    </div><br><br>
          <!--a (click)="createPdf()"-->
          
          <!--a type="submit" ><img src="assets/Imagenes/Exportar_a_Pdf.png" alt="logo" style="width:50px" align="right"></a-->
                      
          <!--button (click)="downloadPDF()">pdf</button-->
          <!--div id="content" #content></div>
        </div-->
        
   <!--input type="submit" value="hola" -->
    <!--p><input type="image" src="assets/Imagenes/Exportar_a_Pdf.png" style="width:55px" align="right"></p-->

  </form>



</body>
</html>