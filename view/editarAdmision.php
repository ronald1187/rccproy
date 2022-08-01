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
    <link rel="stylesheet" href="../Style/bootstrap_icons/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <?php 
    require_once('../class/menu.php');
    $no=$_GET['no'];
    $consulta=mysqli_query($conexion,"SELECT * FROM admision, alumno, pariente, docente, curso, recibo
    WHERE alumno.id_alumno=admision.N_alumno
    AND pariente.id_pariente=admision.N_pariente
    AND docente.id_docente=admision.N_docente
    AND curso.id_curso=admision.N_curso
    AND recibo.N_admision=admision.id_admision
    
    AND admision.id_admision='".$no."';");
      while($fila=mysqli_fetch_array($consulta)){
        $id_admision=$fila[0];
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
              $sexo1=mysqli_query($conexion,"SELECT sexo FROM sexo WHERE id_sexo='".$sexo."'");
                while($sexo2=mysqli_fetch_array($sexo1)){
                    $sexo3=$sexo2['sexo'];
                }   
  
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
    }
    ?>
<br>
<h2 align="center">FORMULARIO EDICIÓN</h2><br>

<form type="form" action="../assets/download/formAdmisionpdf.php" method="post" target="print_popup" id=formulario>

    <div class="container">
      <div class="row">
        
      <input value="<?php echo $no; ?>" type="hidden" name="nro" id="nro">
      <input value="<?php echo $id_admision; ?>" type="hidden" name="id_admision" id="id_admision">
      <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">FECHA DE INICIO:</label>
          <div class="col-xs-10 col-sm-8 col-md-4 col-lg-5 col-xl-6"> 
          <input value="<?php echo $fecha_inicio;?>" name="fecha" id="fecha" type="date" class="form-control" placeholder="Fecha de Inicio">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Recibo:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input onkeypress="return numeros(this)" value="<?php echo $num_recibo;?>" type="text" name="recibo" id="recibo" class="form-control" placeholder="Nro">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PROFESOR:</label>
        <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5 col-xl-6">
          <select name="docente" id="docente" class="form-control form-select">
              <option value="0"><?php echo strtoupper($nombre_docente)?></option> 
            <?php 
                $query="SELECT * FROM docente ORDER BY docente.id_docente";
                $respuesta=mysqli_query($conexion,$query);  //ejecuta la consulta query 
            ?>
            <?php foreach ($respuesta as $opciones):?>
              <option value="<?php echo $opciones['id_docente']?>"><?php echo strtoupper($opciones['nombre_completo'])?></option>           
            <?php endforeach ?>
          </select>
          <input type="hidden" value="<?php echo $nombre_docente;?>" class="form-control" name="profesor" id="profesor">
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
          <input value="<?php echo $nombre;?>" name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombres">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">AP. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $ap_paterno;?>" name="ap_paterno" id="ap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $ap_materno;?>" name="ap_materno" id="ap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">EDAD</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" value="<?php echo $edad;?>" name="edad" id="edad" type="text" class="form-control" placeholder="Edad">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-form-label">FECHA DE NACIMIENTO:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3 col-xl-3">
          <input value="<?php echo $fecha_nacimiento;?>" name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" placeholder="Fecha de Nacimiento">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">CI:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" value="<?php echo $carnet;?>" name="ci" id="ci" type="text" class="form-control" placeholder="Nro de Carnet" type="number">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-2 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" value="<?php echo $celular;?>" name="nro_celular" id="nro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">DIRECCION:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <input value="<?php echo $direccion;?>" name="direccion" id="direccion" type="text" class="form-control " placeholder="Direccion">
          </div>

          <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">SEXO:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          
            <select name="sexo" id="sexo" type="text" class="form-control form-select" >
              <option value="0"><?php echo $sexo3?></option> 
              <?php $query="SELECT * FROM sexo ORDER BY sexo.id_sexo";
                  $respuesta=mysqli_query($conexion,$query);  //ejecuta la consulta query 
              ?>
              <?php foreach ($respuesta as $opciones):?>
              <option value="<?php echo $opciones['sexo']?>"><?php echo strtoupper($opciones['sexo'])?></option>           
              <?php endforeach ?>
            </select>
          </div><br>
      </div>
      <br>
  
      <h4>REFERENCIA FAMILIAR</h4>
  
      <div class="row">
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">NOMBRE:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $nombre_pariente;?>" name="refnombre" id="refnombre" type="text" class="form-control" placeholder="Nombre">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $apellidopat_pariente;?>" name="refap_paterno" id="refap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input value="<?php echo $apellidomat_pariente;?>" name="refap_materno" id="refap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" value="<?php echo $celular_pariente;?>" name="refnro_celular" id="refnro_celular" type="text" class="form-control" placeholder="Nro de Celular">
          </div>
      </div>
      <br>

      <h4>REFERENCIA HORARIA Y FRECUENCIA SEMANAL</h4>       
      
      <br>
      <div class="row">
            <label class="col-xs-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">CURSO:</label>
              <div id="select2lista" class="col-xs-10 col-sm-10 col-md-10 col-lg-11 col-xl-11">
              </div>

              <div id="select3lista">
              </div>
      </div>
    <br>
    
      <div class="row">
            <input type="hidden" value="<?php echo $nombre_curso;?>" name="editar_curso" id="editar_curso" type="text" class="form-control" placeholder="Edad">
            <input type="hidden" value="<?php echo $dias;?>" class="form-control" name="dias1" id="dias1">
            <input type="hidden" value="<?php echo $hora_desde;?>" name="hora_desde1" id="hora_desde1" type="time" class="form-control">
            <input type="hidden" value="<?php echo $hora_hasta;?>" name="hora_hasta1" id="hora_hasta1" type="time" class="form-control">
      </div>

<button  formtarget="_self" type="submit" name="btn_guardar_edicion" id="btn_guardar_edicion" class="btn btn-primary btn-h-8 px-5 ml-4" type="button" onclick="this.form.action='../class/editar.php'">Guardar Cambios</button>
<a href="listaAdmision.php" class="btn btn-primary btn-h-8 px-5 ml-4">Cancelar</a>
<input name="pdf" type="image" src="../assets/Imagenes/Exportar_a_Pdf.png" style="width:65px" align="right" onclick="this.form.action='../assets/download/formAdmisionpdf.php'">
   
</div><br><br>

</form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#docente').val();
    $('#nro').val();
    recargarLista();

    $('#docente').change(function(){
      recargarLista();
    });
    $('#nro').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"../class/editarAdmisionSelect.php",
      data: $("#formulario").serialize(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>

<script type="text/javascript">
    function numeros(evt)
    {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
     return true;
    }
</script>