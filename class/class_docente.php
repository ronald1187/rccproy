<?php
require_once("../config/conexion.php");

if(isset($_POST["btn_editar"])){
    $id=$_POST["id_docente"];
    $nombre_docente= strtoupper($_POST["docente"]);
    $ci=$_POST["ci"];

//datos del docente
    $sentencia_docente = ("UPDATE docente SET
    nombre_completo='$nombre_docente',
    ci_docente='$ci'
    WHERE id_docente='$id';
    ");
    $respuesta_docente=mysqli_query($conexion,$sentencia_docente);
 if($respuesta_docente!=false){
        if(mysqli_affected_rows($conexion)!=0){
            echo"<script>
            alert('Los datos fueron modificados correctamente... ');
            location='../view/lista_docente.php';
            </script>";
        }
 }
}

if(isset($_POST["btn_guardar"])){
$docente= strtoupper($_POST["docente"]);
$ci_docente= $_POST["ci"];
if($docente!=''){
$guardar="INSERT INTO docente (
    id_docente,
    nombre_completo,
    ci_docente
    )
    VALUES(
    NULL,
    '$docente',
    '$ci_docente');";

    $resultado=mysqli_query($conexion, $guardar);

    if($resultado!=false){
        if(mysqli_affected_rows($conexion)!=0){
            echo"<script>
            alert('Los Datos se insertaron correctamente !!!');
            location='../view/lista_docente.php';
            </script>";
        }

    }
    else{
        echo "Error....";
        mysql_close($conexion);
    }
}
else{
    echo "
        <script>
            location='../view/add_docente.php';
        </script>";
}
}
?>