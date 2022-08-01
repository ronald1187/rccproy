<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['id_alumno'];
    $nombre = $_POST["txt_nombre"];
    $apellido_pat = $_POST["txt_apellid_pat"];
    $apellido_mat = $_POST["txt_apellido_mat"];
    $edad = $_POST["txt_edad"];
    $fecha_nac = $_POST["txt_fecha_nac"];
    $carnet = $_POST["txt_carnet"];
    $celular = $_POST["txt_celular"];
    $direccion = $_POST["txt_direccion"];
    $nombre_parent = $_POST["txt_nombre_parent"];
    $apellido_parent = $_POST["txt_apellido_parent"];
    $celular_parent = $_POST["txt_celular_parent"];
    $celular2_parent = $_POST["txt_celular2_parent"];
    $docente = $_POST["cmb_docente"];
    $dias = $_POST["cmb_dias"];
    $horario = $_POST["cmb_horario"];
    $sexo = $_POST["cmb_sexo"];
    

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?,
     edad = ?,
      signo = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>