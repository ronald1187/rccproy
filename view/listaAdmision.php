<?php
  include_once "../config/conexion.php";

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
    <link rel="icon" href="../assets/imagenes/LogoESMAR.png">
    <title>Lista</title>
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/bootstrap_icons/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../Style/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
require_once('../class/menu.php');
?>

<form method="POST" action="#" class="container" >
    <div class="container">

    <br>   
    <h3>Lista de Inscritos</h3>
        <section class="main row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">
                <h6>Carnet Identidad</h6>
                <input type="text" class="form-control" placeholder="C.I." name="ci" id="ci">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">
                <h6>Nombre</h6>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">
                <h6>Apellido Paterno</h6>
                <input type="text" class="form-control" placeholder="Apellido Paterno" id="ap_paterno" name="ap_paterno">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">    
                <h6>Apellido Materno</h6>
                <input type="text" class="form-control" placeholder="Apellido Materno" name="ap_materno" id="ap_materno">
            </div> 
        </section><br>

        <div class="btn-group btn-group-sm">
            <button type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_buscar" name="btn_buscar">Buscar</button>
        </div>
    


<?php

$consulta="SELECT * FROM alumno, admision, curso, recibo
WHERE alumno.id_alumno=admision.N_alumno
AND admision.N_curso=curso.id_curso
AND admision.id_admision=recibo.N_admision
ORDER BY alumno.id_alumno DESC;";

if(isset($_POST['btn_buscar'])){
    $bci=$_POST['ci'];
    $bnombre=$_POST['nombre'];
    $bap_paterno=$_POST['ap_paterno'];
    $bap_materno=$_POST['ap_materno'];
    $consulta="SELECT * FROM alumno, admision, curso, recibo
    WHERE alumno.id_alumno=admision.N_alumno
    AND admision.N_curso=curso.id_curso
    AND admision.id_admision=recibo.N_admision
    AND carnet LIKE '%$bci%' 
    AND nombre LIKE '%$bnombre%' 
    AND apellido_pat LIKE '%$bap_paterno%' 
    AND apellido_mat LIKE '%$bap_materno%' 
    ORDER BY alumno.id_alumno DESC";
}

$respuesta=mysqli_query($conexion,$consulta);
$contadorAutomatico=mysqli_num_rows($respuesta);	//cuenta todos los registros de una tabla
$sw=0;

while($fila=mysqli_fetch_array($respuesta))
{
    
	if($sw==0)
	{
        echo "<table class='table table-hover'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th scope='col'>Nro<br>Inscrito</th>";
                    echo "<th scope='col'>Nro<br>Recibo</th>";
                    echo "<th scope='col'>CI</th>";
                    echo "<th scope='col'>NOMBRE COMPLETO</th>";
                    echo "<th scope='col'>CURSO</th>";
                    echo "<th scope='col'>FECHA<br>INICIO</th>";
                echo "</tr>";
            echo "</thead>";
        
	}
	$sw=1;
    $id_alumno=$fila[10];
    $fecha_inicio=$fila[11];
    $ci=$fila[6];
	$nombres=$fila[1];
	$paterno=$fila[2];
	$materno=$fila[3];
    $curso=$fila[17];
    $recibo=$fila[22];
	
   
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>";
                        echo "<a class='nav p-0 ml-0' href='reinscripcion.php?no=".$fila['id_admision']."' 
                        type='button' id='editar' name='editar' title='Reinscribir'>
                        <span class='bi bi-person-plus' style='font-size:18px!important;'></span>";
                    echo "</td>";

                    echo "<td>";
                        echo "<a class='nav p-0 m-0 ml-0' href='vistaInscrito.php?no=".$fila['id_admision']."' 
                        type='button' id='verInscrito' name='verInscrito' title='Ver Datos'>
                        <span class='bi bi-person-lines-fill' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    
                    echo "<td>";
                        echo "<a class='nav p-0 ml-0' href='editarAdmision.php?no=".$fila['id_admision']."' 
                        type='button' id='editar' name='editar' title='Editar'>
                        <span class='bi bi-pencil-square' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    echo "<td>".$id_alumno."</td>";
                    echo "<td>".$recibo."</td>";
                    echo "<td>".$ci."</td>";
                    echo "<td>".$nombres." ".$paterno." ".$materno."</td>";
                    echo "<td>".$curso."</td>";
                    echo "<td>".$fecha_inicio."</td>";
                echo "</tr>";
            echo "</tbody>";   
    
}


if($contadorAutomatico==0){
    echo "<h6>El inscrito no existe !!!</h6>";
}
else{
    echo "<h6>Existen ".$contadorAutomatico." inscritos</h6>";
}
  
mysqli_close($conexion);



?>
</div>
</form>       

</body>
</html>