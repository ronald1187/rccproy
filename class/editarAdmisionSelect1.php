<?php
  require_once('../config/conexion.php');
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
  
<?php
  $id_curso=$_POST['curso'];
  $curso1=$_POST['editar_curso1'];
  $dias2=$_POST['dias2'];
  $hora_desde2=$_POST['hora_desde2'];
  $hora_hasta2=$_POST['hora_hasta2'];

if($id_curso==0){
  $dias1=$dias2;
  $hora_desde=$hora_desde2;
  $Hora_hasta=$hora_hasta2;
}
else{
  $dias="SELECT GROUP_CONCAT(' ',dias.dias) FROM curso_dias, curso, dias 
  WHERE curso_dias.N_dias=dias.id_dias 
  AND curso_dias.N_curso=curso.id_curso 
  AND curso_dias.N_curso='$id_curso';";
  $respuestaDia=mysqli_query($conexion,$dias);
  while($fila=mysqli_fetch_array($respuestaDia)){
    $dias1=$fila[0];
  }
  $hora="SELECT * FROM curso WHERE id_curso='$id_curso';";
  $respuestaHora=mysqli_query($conexion,$hora);
  while($fila1=mysqli_fetch_array($respuestaHora)){
    $hora_desde=$fila1[2];
    $Hora_hasta=$fila1[3];
  }
}
?>
<div class="row">
  <input value="<?php echo $id_curso;?>" type="hidden" name="curso" id="curso" class="form-control">
  <label class="col-xs-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">DÍAS:</label>
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-5 col-xl-5">
      
      <input readonly="readonly" value="<?php echo $dias1;?>" type="text" name="dias" id="dias" class="form-control" placeholder="Dias">
    </div>
    
  <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-2 col-xl-2">
      <input readonly="readonly" value="<?php echo $hora_desde;?>" name="hora_desde" id="hora_desde" type="time" class="form-control">
    </div>
    <label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Hasta:</label>
   
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-2 col-xl-2">
        <input readonly="readonly" value="<?php echo $Hora_hasta;?>" name="hora_hasta" id="hora_hasta" type="time" class="form-control">
    </div>
</div>
          
</body>
</html>