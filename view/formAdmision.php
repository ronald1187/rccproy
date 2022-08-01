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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../Style/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Style/jquery-3.3.1.min.js"></script>
    <link rel="icon" href="../assets/imagenes/LogoESMAR.png">
    <title>Fromulario Inscripción</title>
</head>
<body>
<?php require_once('../class/menu.php');?>
<br>  
<h2 align="center">FORMULARIO DE INSCRIPCION</h2><br>

<?php $fcha = date("Y-m-d");?>
<form type="form" action="#" method="post" target="print_popup">
<!--form type="form" action="../assets/download/formAdmisionpdf.php" method="post"-->
    <div class="container">
      <div class="row">
        
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">FECHA DE INICIO:</label>
          <div class="col-xs-10 col-sm-8 col-md-4 col-lg-5 col-xl-6"> 
          <input name="fecha" id="fecha" type="date" value="<?php echo $fcha;?>" class="form-control" placeholder="Fecha de Inicio">
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Recibo:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
          <input onkeypress="return numeros(this)" type="text" name="recibo" id="recibo" class="form-control" placeholder="Nro" required>
          </div>
  
        <label class="col-xs-2 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PROFESOR:</label>
          <div class="col-xs-10 col-sm-8 col-md-5 col-lg-5 col-xl-6">
          <select name="docente" id="docente" class="form-control form-select" required>
            <!--option selected><!?php echo "Seleccione Profesor"?></option--> 
            <?php 
                $query="SELECT * FROM docente ORDER BY docente.id_docente";
                $respuesta=mysqli_query($conexion,$query);  //ejecuta la consulta query 
            ?>
            <?php foreach ($respuesta as $opciones):?>
              <!--option value="<!?php echo strtoupper($opciones['nombre_completo'])?>"><!?php echo strtoupper($opciones['nombre_completo']." ".$opciones['apellido'])?></option--> 
              <option value="<?php echo $opciones['id_docente']?>"><?php echo strtoupper($opciones['nombre_completo'])?></option>           
            <?php endforeach ?>
          </select>
        </div>
    
        <label class="col-xs-2 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-form-label">Nro de Inscrito:</label>
          <div class="col-xs-10 col-sm-8 col-md-2 col-lg-3 col-xl-2">
              <?php 
              $mayor = mysqli_query($conexion, "SELECT max(id_alumno) FROM alumno");
              $mayor1 = mysqli_fetch_array($mayor);
              $mayorfinal=$mayor1[0]+1;
              ?>
            <input readonly="readonly" value="<?php echo $mayorfinal;?>" name="nro_inscrito" id="nro_inscrito" type="text" class="form-control" placeholder="Nro">
          </div>
      </div>
      <br>
  
      <h4>DATOS DEL ALUMNO</h4>
      <div class="row">
        
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">NOMBRE:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombres" required>
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">AP. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="ap_paterno" id="ap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="ap_materno" id="ap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">EDAD</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" name="edad" id="edad" type="text" class="form-control" placeholder="Edad" required>
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-xl-3 col-form-label">FECHA DE NACIMIENTO:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-3 col-xl-3">
          <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control" placeholder="Fecha de Nacimiento" required>
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">CI:</label>
          <div class="col-xs-12 col-sm-8 col-md-3 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" name="ci" id="ci" type="text" class="form-control" placeholder="Nro de Carnet" required>
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-2 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" name="nro_celular" id="nro_celular" type="text" class="form-control" placeholder="Nro de Celular" >
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">DIRECCION:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
          <input name="direccion" id="direccion" type="text" class="form-control" placeholder="Direccion" required>
          </div>

        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">SEXO:</label>
          <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 col-xl-4">
            <select name="sexo" id="sexo" type="text" class="form-control form-select" placeholder="hola" required>
              <option value=""><?php echo "Seleccione sexo"?></option> 
              <?php $query="SELECT * FROM sexo ORDER BY sexo.id_sexo";
                  $respuesta=mysqli_query($conexion,$query);
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
          
        <!--label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">PARENTESCO:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="parentesco" id="parentesco" type="text" class="form-control" placeholder="Parentesco">
          </div-->
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">NOMBRE:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="refnombre" id="refnombre" type="text" class="form-control" placeholder="Nombre" required>
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Paterno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="refap_paterno" id="refap_paterno" type="text" class="form-control" placeholder="Apellido Paterno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Ap. Materno:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input name="refap_materno" id="refap_materno" type="text" class="form-control" placeholder="Apellido Materno">
          </div>
  
        <label class="col-xs-12 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-form-label">Nro Celular:</label>
          <div class="col-xs-12 col-sm-8 col-md-4 col-lg-4 col-xl-4">
          <input onkeypress="return numeros(this)" name="refnro_celular" id="refnro_celular" type="text" class="form-control" placeholder="Nro de Celular" required>
          </div>
      </div>
      <br>

      <h4>REFERENCIA HORARIA Y FRECUENCIA SEMANAL</h4>       
      <div class="row">
            <label class="col-xs-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">CURSO:</label>
              <div id="select2lista" class="col-xs-10 col-sm-10 col-md-10 col-lg-11 col-xl-11">
              </div>
              <div id="select3lista"></div>
      </div>
<br>
          <button style="margin: 15px" formtarget="_self" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_guardar" name="btn_guardar" onclick="this.form.action='../class/insertar.php'">Guardar</button> 
          <a href="listaAdmision.php" class="btn btn-primary btn-h-8 px-5 ml-4">Cancelar</a>
          <input name="pdf" type="image" src="../assets/Imagenes/Exportar_a_Pdf.png" style="width:65px" align="right" onclick="this.form.action='../assets/download/formAdmisionpdf.php'">
          
        </div><br><br>
        
  </form>

<br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#docente').val(0);
    recargarLista();

    $('#docente').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"../class/formAdmisionSelect.php",
      data:"docente=" + $('#docente').val(),
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