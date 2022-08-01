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
$curso=$_POST['editar_curso'];
$no=$_POST['nro'];
$id_docente=$_POST['docente'];
$dias=$_POST['dias1'];
$nombre_curso=$_POST['editar_curso'];
$hora_desde=$_POST['hora_desde1'];
$hora_hasta=$_POST['hora_hasta1'];
?>

  <form type="form" method="post" id=formulario1>        
    <select name="curso" id="curso" class="form-control form-select">
      <option value="0"><?php echo $curso?></option>
        <?php 
            $query1="SELECT * FROM curso_docente, curso, docente 
                    WHERE curso_docente.N_curso=docente.id_docente 
                    AND curso_docente.N_curso=curso.id_curso 
                    AND curso_docente.N_docente='$id_docente';";
            $respuesta=mysqli_query($conexion,$query1);	//ejecuta la consulta query
           foreach ($respuesta as $opciones):
        ?>
          <option value="<?php echo $opciones['id_curso']?>"><?php echo strtoupper($opciones['nombre_curso'])?></option>           
        <?php endforeach ?>
      </select>
        <input type="hidden"readonly="readonly" value="<?php echo $dias;?>" class="form-control" name="dias2" id="dias2">
        <input type="hidden" value="<?php echo $nombre_curso;?>" name="editar_curso1" id="editar_curso1" type="text" class="form-control" placeholder="Edad">
        <input type="hidden" type="" readonly="readonly" value="<?php echo $hora_desde;?>" name="hora_desde2" id="hora_desde2" type="time" class="form-control">
        <input type="hidden" readonly="readonly" value="<?php echo $hora_hasta;?>" name="hora_hasta2" id="hora_hasta2" type="time" class="form-control">
  </form>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#curso').val();
		recargarDia();

		$('#curso').change(function(){
			recargarDia();
		});
	})
</script>
<script type="text/javascript">
	function recargarDia(){
		$.ajax({
			type:"POST",
			url:"../class/editarAdmisionSelect1.php",
			//data:"curso=" + $('#curso').val(),
      data: $("#formulario1").serialize(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
