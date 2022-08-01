<?php
    require_once "../config/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/bootstrap_icons/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../Style/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="../assets/imagenes/LogoESMAR.png">
    <title>Lista Docente</title>
</head>
<body>
    <?php
    require_once "../class/menu.php";
    
    ?>

    <form type="form" action="#" method="POST">
        <div class="container">
        <br>
        <h2>Lista de Docentes</h2>
        <br>
        <section class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">
                <h6>Carnet Identidad</h6>
                <input type="text" class="form-control" placeholder="C.I." name="ci_docente" id="ci_docente">
            </div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 col-xl-3">
                <h6>Nombre</h6>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre_docente" id="nombre_docente">
            
            </div>
        <section>
                <button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_buscar" name="btn_buscar">Buscar</button>
                <a href="add_docente.php" class="btn btn-primary px-5">Nuevo</a>
            <br>
            
    <script type="text/javascript">
          <?php $no=$_GET['no'];?>
           {
               <?php
                mysqli_query($conexion, "DELETE FROM docente WHERE id_docente='".$no."' ;") ;
                ?>
           }
    </script>
            <?php

$consulta="SELECT * FROM docente
ORDER BY docente.id_docente DESC;";

if(isset($_POST['btn_buscar'])){
    $bci=$_POST['ci_docente'];
    $bnombre_docente=$_POST['nombre_docente'];
    $consulta="SELECT * FROM docente
    WHERE ci_docente LIKE '%$bci%' 
    AND nombre_completo LIKE '%$bnombre_docente%' 
    ORDER BY docente.id_docente DESC";
}
$respuesta=mysqli_query($conexion,$consulta);
$contadorAutomatico=mysqli_num_rows($respuesta);
$sw=0;

while($fila=mysqli_fetch_array($respuesta))
{   
	if($sw==0)
	{
        echo "<div class='col-sm-12 col-md-10 col-lg-9 col-xl-7'>";
        echo "<table class='table table-hover'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th class='col-sm-1 col-md-1 col-lg-1 col-xl-1'></th>";
                    echo "<th></th>";
                    echo "<th scope='col'>Codigo</th>";
                    echo "<th scope='col'>CI</th>";
                    echo "<th scope='col'>NOMBRE COMPLETO</th>";
                echo "</tr>";
            echo "</thead>";
	}
	$sw=1;
    $id_docente=$fila[0];
    $nombre=$fila[1];
    $ci_docente=$fila[2];
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>";
                    echo "<a class='nav p-0 m-0 ml-0' href='?no=".$fila['id_docente']."' 
                        type='button' title='Eliminar' id='eliminar' name='eliminar' onclick='return eliminar()'>
                        <span class='bi bi-trash' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    
                    echo "<td>";
                        echo "<a class='nav p-0 ml-0' href='editar_docente.php?no=".$fila['id_docente']."' 
                        type='button' id='editar' name='editar' title='Editar'>
                        <span class='bi bi-pencil-square' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    echo "<td>".$id_docente."</td>";
                    echo "<td>".$ci_docente."</td>";
                    echo "<td>".$nombre."</td>";
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

    <script type='text/javascript'>
        function eliminar()
        {
            var respuesta=confirm("Estas seguro que deseas elimninar el docente?");
            if(respuesta==true){ return true; 
            }
            else{ return false; }    
        }
    </script>  
</body>
</html>
