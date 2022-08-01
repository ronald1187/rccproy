<?php

require_once('../config/conexion.php');


if(isset($_POST["btn_guardar_edicion"]))
{
    $id_admision=$_POST["id_admision"];
    $nro_inscrito = $_POST["nro"];
    $fecha_inicio = $_POST["fecha"];
    $nro_recibo = $_POST["recibo"];
    $nombre = strtoupper($_POST["nombre"]);
    $apellido_pat = strtoupper($_POST["ap_paterno"]);
    $apellido_mat = strtoupper($_POST["ap_materno"]);
    $edad = $_POST["edad"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $ci = $_POST["ci"];
    $nro_celular = $_POST["nro_celular"];
    $direccion = strtoupper($_POST["direccion"]);
    $sexo = $_POST["sexo"];
    if($sexo==0){
      $consulta_sexo = mysqli_query($conexion, "SELECT N_sexo FROM alumno WHERE id_alumno='$nro_inscrito'");
      while($r_sexo=mysqli_fetch_array($consulta_sexo))
      {$res_sexo=$r_sexo['N_sexo'];}
    }
    else{
    $consulta_sexo = mysqli_query($conexion, "SELECT id_sexo FROM sexo WHERE sexo = '$sexo' ");
        while($r_sexo=mysqli_fetch_array($consulta_sexo))
        {$res_sexo=$r_sexo['id_sexo'];}
      }
    $nombre_parent = strtoupper($_POST["refnombre"]);
    $appat_parent = strtoupper($_POST["refap_paterno"]);
    $apmat_parent= strtoupper($_POST["refap_materno"]);
    $celular_parent = $_POST["refnro_celular"];
    $curso= $_POST["curso"];
    $profesor = $_POST["docente"];
    
//Datos del Alumno
    $sentencia_alumno =("UPDATE alumno, admision  SET 
    nombre='$nombre',
    apellido_pat='$apellido_pat',
    apellido_mat='$apellido_mat',
    edad='$edad',
    fecha_nac='$fecha_nacimiento',
    carnet='$ci',
    celular='$nro_celular',
    direccion='$direccion',
    N_sexo='$res_sexo'
    WHERE alumno.id_alumno=admision.N_alumno
    AND admision.N_alumno='".$id_admision."';");   
    $respuesta_alumno=mysqli_query($conexion,$sentencia_alumno);
    if(mysqli_affected_rows($conexion)!=0){
      $a=1;
    }else{$a=0;}

//Datos Pariente
    $sentencia_pariente = ("UPDATE pariente, admision 
    SET tipo_pariente = 'FAMILIAR', 
    nombre_pariente = '$nombre_parent', 
    apellidopat_pariente = '$appat_parent', 
    apellidomat_pariente = '$apmat_parent', 
    celular_parentesco = '$celular_parent' 
    WHERE pariente.id_pariente=admision.N_pariente
    AND admision.N_pariente = '".$id_admision."';");
    $respuesta_pariente=mysqli_query($conexion,$sentencia_pariente);
    if(mysqli_affected_rows($conexion)!=0){
      $b=1;
    }else{$b=0;}

//FECHA INICIO
    $sentencia_inicio = ("UPDATE admision
    SET fecha_inicio = '$fecha_inicio'
    WHERE id_admision = '".$id_admision."';");
    $respuesta_inicio=mysqli_query($conexion,$sentencia_inicio);
    if(mysqli_affected_rows($conexion)!=0){
      $c=1;
    }else{$c=0;}

//CURSO    
if($profesor==0||$curso==0){
  $consulta_profesor = mysqli_query($conexion, "SELECT N_docente FROM admision WHERE id_admision='$nro_inscrito'");
    while($r_profesor=mysqli_fetch_array($consulta_profesor))
    {$profesor=$r_profesor['N_docente'];}

  $consulta_curso = mysqli_query($conexion, "SELECT N_curso FROM admision WHERE id_admision='$nro_inscrito'");
    while($r_curso=mysqli_fetch_array($consulta_curso))
    {$curso=$r_curso['N_curso'];}

  $sentencia_profesor = ("UPDATE admision, pariente
  SET N_curso= '$curso', 
  N_docente = '$profesor'
  WHERE pariente.id_pariente=admision.N_pariente
  AND admision.N_pariente = '".$id_admision."';");
  $respuesta_profesor=mysqli_query($conexion,$sentencia_profesor);
  if(mysqli_affected_rows($conexion)!=0){
    $d=1;
  }else{$d=0;}

}
else{
    $sentencia_profesor = ("UPDATE admision, pariente
    SET N_curso= '$curso', 
    N_docente = '$profesor'
    WHERE pariente.id_pariente=admision.N_pariente
    AND admision.N_pariente = '".$id_admision."';");
    $respuesta_profesor=mysqli_query($conexion,$sentencia_profesor);
    if(mysqli_affected_rows($conexion)!=0){
      $d=1;
    }else{$d=0;}
}

          if($respuesta_alumno||$respuesta_pariente||$respuesta_inicio||$respuesta_profesor!=false)
            {
              if($a||$b||$c||$d!=0)
              {
                echo"<script>
                alert('LOS DATOS SE HAN GUARDADO \\nCORRECTAMENTE !!!');
                location='../view/listaAdmision.php';
                </script>";
              }
              else{
                
                echo "<script>
                alert('NINGUN DATO FUE MODIFICADO !!!');
                location='../view/editarAdmision.php?no=".$id_admision."';</script>";
              }
            }
          else{
              echo "ERROR....";
              mysqli_close($conexion);
            }
}  
    
?>
