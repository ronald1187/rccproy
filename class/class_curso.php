<?php
require_once("../config/conexion.php");

if(isset($_POST["btn_editar"])){
    $id_curso=$_POST["id_curso"];
    $nombre_curso= strtoupper($_POST["curso"]);
    $hora_desde=$_POST["hora_desde"];
    $hora_hasta=$_POST["hora_hasta"];
    //$lunes=$_POST["lunes"];
    //$martes=$_POST["martes"];
    //$miercoles=$_POST["miercoles"];
    //$jueves=$_POST["jueves"];
    //$viernes=$_POST["viernes"];
    //$sabado=$_POST["sabado"];
    //$domingo=$_POST["domingo"];
    $estado=$_POST["estado"];

//CURSO
    $sentencia_curso = ("UPDATE curso SET
    nombre_curso='$nombre_curso',
    hora_desde='$hora_desde',
    hora_hasta='$hora_hasta',
    estado='$estado'
    WHERE curso.id_curso='$id_curso';
    ");
    $respuesta_curso=mysqli_query($conexion,$sentencia_curso);
 if($respuesta_curso!=false){
        if(mysqli_affected_rows($conexion)!=0){
            echo"<script>
            alert('Los datos fueron modificados correctamente... ');
            location='../view/lista_curso.php';
            </script>";
        }
        else{
            echo"<script>
            alert('No se modificó ningun dato... ');
            location='../view/editar_curso.php?no=".$id_curso."';
            </script>";
 }
 }
}

if(isset($_POST["btn_guardar"])){
$curso= strtoupper($_POST["curso"]);
$hora_desde= $_POST["hora_desde"];
$hora_hasta= $_POST["hora_hasta"];
 // if($curso!=''){
if(isset($_POST["lunes"])||isset($_POST["martes"])||isset($_POST["miercoles"])||isset($_POST["jueves"])||isset($_POST["viernes"])||isset($_POST["sabado"])||isset($_POST["domingo"])){

    //CURSO
    $guardar="INSERT INTO curso (
        id_curso,
        nombre_curso,
        hora_desde,
        hora_hasta,
        estado
        )
        VALUES(
        NULL,
        '$curso',
        '$hora_desde',
        '$hora_hasta',
        '1');";
    $resultado_curso=mysqli_query($conexion, $guardar);
    //DIAS
    $id_curso =mysqli_query($conexion, "SELECT MAX(id_curso) FROM curso");
    $id_curso1 = mysqli_fetch_array($id_curso);
              $id_curso_final=$id_curso1[0];

      if (isset($_POST["lunes"])){
      $guardar="INSERT INTO curso_dias (
          id_curso_dias,
          N_curso,
          N_dias
          )
          VALUES(
          NULL,
          '$id_curso_final',
          '1');";
          mysqli_query($conexion, $guardar);   
      }

      if (isset($_POST["martes"])){
        $guardar="INSERT INTO curso_dias (
            id_curso_dias,
            N_curso,
            N_dias
            )
            VALUES(
            NULL,
            '$id_curso_final',
            '2');";
            mysqli_query($conexion, $guardar);   
      }

      if (isset($_POST["miercoles"])){
        $guardar="INSERT INTO curso_dias (
            id_curso_dias,
            N_curso,
            N_dias
            )
            VALUES(
            NULL,
            '$id_curso_final',
            '3');"; 
            mysqli_query($conexion, $guardar);   
      }

      if (isset($_POST["jueves"])){
        $guardar="INSERT INTO curso_dias (
            id_curso_dias,
            N_curso,
            N_dias
            )
            VALUES(
            NULL,
            '$id_curso_final',
            '4');";  
            mysqli_query($conexion, $guardar);  
      }
      
      if (isset($_POST["viernes"])){
        $guardar="INSERT INTO curso_dias (
            id_curso_dias,
            N_curso,
            N_dias
            )
            VALUES(
            NULL,
            '$id_curso_final',
            '5');";
            mysqli_query($conexion, $guardar);   
      }

      if (isset($_POST["sabado"])){
       $guardar="INSERT INTO curso_dias (
           id_curso_dias,
           N_curso,
           N_dias
           )
           VALUES(
           NULL,
           '$id_curso_final',
           '6');";    
           mysqli_query($conexion, $guardar);
      }
         
      if (isset($_POST["domingo"])){
        $guardar="INSERT INTO curso_dias (
            id_curso_dias,
            N_curso,
            N_dias
            )
            VALUES(
            NULL,
            '$id_curso_final',
            '7');"; 
          mysqli_query($conexion, $guardar);     
      }

//
        if($resultado_curso!=false)
        {
          if(mysqli_affected_rows($conexion)!=0)
          {
            echo"<script>
            alert('Los Datos se insertaron correctamente !!!');
            location='../view/lista_curso.php';
            </script>";
          }
          else{
            
            echo "<script>
            alert('No se registro ningun dato !!!');
            location='../view/add_curso.php';</script>";
          }
        }
        else{
          echo "ERROR....";
          mysqli_close($conexion);
        }
  }
  else{
    echo "<script>
    alert('El dia no fue seleccionado !!!');
    location='../view/add_curso.php';
    </script>";

  }
}
?>