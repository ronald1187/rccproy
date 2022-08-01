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
        <h2>Lista de Cursos</h2>
        <br>
        <section class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-3">
                <h6>Curso</h6>
                <input type="text" class="form-control" placeholder="Todos" name="curso" id="curso">
            </div>
            <div class="col-xs-5 col-sm-5 col-md-2 col-lg-4 col-xl-3">
                <h6>Estado</h6>
                <select name="estado" id="estado" type="text" class="form-control form-select ">
                    <option value=""><?php echo "Todos"?></option>
                    <option value="1"><?php echo "Activo"?></option>
                    <option value="0"><?php echo "Inactivo"?></option>
                </select>
            </div>
        <section>
                <button style="margin: 15px" type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_buscar" name="btn_buscar">Buscar</button>
                <a href="add_curso.php" class="btn btn-primary px-5">Nuevo</a>
            <br>
<!--eliminar   -->         
    <script type="text/javascript">
          <?php $no=$_GET['no'];?>
           {
                <?php
                mysqli_query($conexion, "DELETE FROM curso_dias WHERE N_curso='".$no."' ;") ;
                mysqli_query($conexion, "DELETE FROM curso WHERE id_curso='".$no."' ;") ;
                ?>
           }
    </script>
            <?php

$consulta="SELECT * FROM curso
ORDER BY id_curso DESC;";

if(isset($_POST['btn_buscar'])){
    $bnombre_curso=$_POST['curso'];
    $bestado=$_POST['estado'];
    $consulta="SELECT * FROM curso
    WHERE nombre_curso LIKE '%$bnombre_curso%'
    AND estado LIKE '%$bestado%'
    ORDER BY id_curso DESC";
}
$respuesta=mysqli_query($conexion,$consulta);
$contadorAutomatico=mysqli_num_rows($respuesta);
$sw=0;

while($fila=mysqli_fetch_array($respuesta))
{   
	if($sw==0)
	{
        echo "<div class='col-sm-12 col-md-12 col-lg-12 col-xl-10'>";
        echo "<table class='table table-hover'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th>Cod</th>";
                    echo "<th class='col-sm-12 col-md-7 col-lg-7 col-xl-6'>CURSO</th>";
                    echo "<th class='col-sm-12 col-md-3 col-lg-5 col-xl-3'>Dias</th>";
                    echo "<th scope='col'>HORA DESDE</th>";
                    echo "<th scope='col'>HORA HASTA</th>";
                    echo "<th scope='col'>ESTADO</th>";
                echo "</tr>";
            echo "</thead>";
	}
	$sw=1;
    $id_curso=$fila[0];
    $nombre_curso=$fila[1];
    $hora_desde=$fila[2];
    $hora_hasta=$fila[3];
    $estado=$fila[4];

    $consulta1=mysqli_query($conexion,"SELECT GROUP_CONCAT(' ',LEFT(dias.dias,3)) 
    FROM curso_dias, curso, dias 
    WHERE curso_dias.N_dias=dias.id_dias 
    AND curso_dias.N_curso=curso.id_curso 
    AND curso_dias.N_curso='".$id_curso."';");
    while($fila1=mysqli_fetch_array($consulta1)){
      $dias=$fila1[0];
    }
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>";
                    echo "<a class='nav p-0 m-0 ml-0' href='?no=".$fila['id_curso']."' 
                        type='button' title='Eliminar' id='eliminar' name='eliminar' onclick='return eliminar()'>
                        <span class='bi bi-trash' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    
                    echo "<td>";
                        echo "<a class='nav p-0 m-0 ml-0' href='editar_curso.php?no=".$fila['id_curso']."' 
                        type='button' id='editar' name='editar' title='Editar'>
                        <span class='bi bi-pencil-square' style='font-size:18px!important;'></span>";
                    echo "</td>";
                    echo "<td>".$id_curso."</td>";
                    echo "<td>".$nombre_curso."</td>";
                    echo "<td>".$dias."</td>";
                    echo "<td>".$hora_desde."</td>";
                    echo "<td>".$hora_hasta."</td>";
                    if($estado==1){
                        $estado='ACTIVO';
                    echo "<td class='badge bg-success px-3 nav p-2 m-2'>".$estado."</td>";
                    }
                    else{
                        $estado='INACTIVO';
                        echo "<td class='badge bg-danger nav p-2 m-2'>".$estado."</td>";
                    }
                echo "</tr>";
            echo "</tbody>";    
}

if($contadorAutomatico==0){
    echo "<h6>El Curso no existe !!!</h6>";
}
else{
    echo "<h6>Existen ".$contadorAutomatico." Cursos en la Lista</h6>";
}
  
mysqli_close($conexion);

?>
        </div>  
    </form>

    <script type='text/javascript'>
        function eliminar()
        {
            var respuesta=confirm("Estas seguro que deseas elimninar el curso?");
            if(respuesta==true){ return true; 
            }
            else{ return false; }    
        }
    </script>  
</body>
</html>
