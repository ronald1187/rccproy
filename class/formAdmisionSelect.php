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
$id_docente=$_POST['docente'];
//$id_docente=1;
?>

        
<select name="curso" id="curso" class="form-control form-select">
  <option value="0"><?php echo "Seleccione Curso"?></option> 
    <?php 
        $query1="SELECT * FROM curso_docente, curso, docente 
                WHERE curso_docente.N_curso=docente.id_docente 
                AND curso_docente.N_curso=curso.id_curso 
                AND curso_docente.N_docente='$id_docente';";
        
        $respuesta=mysqli_query($conexion,$query1);	//ejecuta la consulta query 
    ?>
    <?php foreach ($respuesta as $opciones):?>
      <option value="<?php echo $opciones['id_curso']?>"><?php echo strtoupper($opciones['nombre_curso'])?></option>           
    <?php endforeach ?>
  </select>
        

    
      <!--label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">DIA:</label--> 
       
      <!--label class="col-sm-2 col-md-2 col-lg-1 col-xl-1 col-form-label">Desde:</label>
        <div id="select3lista" class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
            </div-->
    
			



</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#curso').val(0);
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
			url:"../class/formAdmisionSelect1.php",
			data:"curso=" + $('#curso').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
