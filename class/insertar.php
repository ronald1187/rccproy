<?php

require_once('../config/conexion.php');

if(isset($_POST["btn_guardar"]))
{ 
    $id_alumno =$_POST["nro_inscrito"];
    $nro_recibo = $_POST["recibo"];
    $nombre = strtoupper($_POST["nombre"]);
    $apellido_pat = strtoupper($_POST["ap_paterno"]);
    $apellido_mat = strtoupper($_POST["ap_materno"]);
    $edad = $_POST["edad"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $fecha_inicio = $_POST["fecha"];
    $ci = $_POST["ci"];
    $nro_celular = $_POST["nro_celular"];
    $direccion = strtoupper($_POST["direccion"]);
    $sexo = $_POST["sexo"];
    $consulta_sexo = mysqli_query($conexion, "SELECT id_sexo FROM sexo WHERE sexo = '$sexo' ");
        while($r_sexo=mysqli_fetch_array($consulta_sexo))
        {
            $res_sexo=$r_sexo['id_sexo'];
        }
    
    $nombre_pariente =strtoupper( $_POST["refnombre"]);
    $appat_pariente = strtoupper($_POST["refap_paterno"]);
    $apmat_pariente = strtoupper($_POST["refap_materno"]);
    $celular_pariente = $_POST["refnro_celular"];
    $id_docente=$_POST["docente"];
    $curso=$_POST["curso"];
    
    //$celular2_parent = $_POST["txt_celular2_parent"];
    //$dias = $_POST["dias"];
    //$consulta_dias = mysqli_query($conexion, "SELECT id_dias FROM dias WHERE dias = '$dias' ");
    //    while($r_dias=mysqli_fetch_array($consulta_dias))
    //    {
    //        $res_dias=$r_dias['id_dias'];
    //    }
    
    //$hora_desde = $_POST["hora_desde"];
    //$hora_hasta = $_POST["hora_hasta"];


  //ALUMNO
    $sentencia ="INSERT INTO alumno (
    id_alumno,
    nombre,
    apellido_pat, 
    apellido_mat, 
    edad,
    fecha_nac,
    carnet,
    celular,
    direccion, 
    N_sexo
    ) 
    VALUES ( 
     null,
    '$nombre',
    '$apellido_pat',
    '$apellido_mat',
    '$edad',
    '$fecha_nacimiento',
    '$ci',
    '$nro_celular',
    '$direccion',
    '$res_sexo'
    );";
    $respuesta=mysqli_query($conexion,$sentencia);

//PARIENTE
$sentencia2 ="INSERT INTO pariente (
  id_pariente,
  tipo_pariente,
  nombre_pariente,
  apellidopat_pariente, 
  apellidomat_pariente, 
  celular_parentesco
  ) 
  VALUES (
  null,
  'FAMILIAR',
  '$nombre_pariente',
  '$appat_pariente',
  '$apmat_pariente',
  '$celular_pariente'
  );";
    $respuesta=mysqli_query($conexion,$sentencia2);

//CURSO
$id_alumno =mysqli_query($conexion, "SELECT MAX(id_alumno) FROM alumno");
$id_alumno1 = mysqli_fetch_array($id_alumno);
              $id_alumno_final=$id_alumno1[0];

//$curso = $_POST["curso"];
//    $sentencia4 ="INSERT INTO curso_alumno (
//      id_curso_alumno,
//      N_curso,
//      N_alumno,
//      N_docente
//      ) 
//      VALUES (
//       null,
//      '$fecha_inicio',
//      '$curso',
//      '$id_alumno_final',
//      '$id_docente'
//      );";
//        $respuesta=mysqli_query($conexion,$sentencia4);
//
//    //ADMISION
//    $id_pariente =mysqli_query($conexion, "SELECT MAX(id_alumno) FROM alumno");
//    $id_pariente1 = mysqli_fetch_array($id_pariente);
//                  $id_pariente_final=$id_pariente1[0];

$id_curso =mysqli_query($conexion, "SELECT id_curso FROM curso");
$id_curso1 = mysqli_fetch_array($id_curso);
              $id_curso_final=$id_curso1[0];

              $id_pariente =mysqli_query($conexion, "SELECT MAX(id_pariente) FROM pariente");
$id_pariente1 = mysqli_fetch_array($id_pariente);
              $id_pariente_final=$id_pariente1[0];

$sentencia4 ="INSERT INTO admision (
  id_admision,
  fecha_inicio,
  N_alumno,
  N_curso, 
  N_docente, 
  N_pariente
  ) 
  VALUES (
  null,
  '$fecha_inicio',
  '$id_alumno_final',
  '$curso',
  '$id_docente',
  '$id_pariente_final'
  );";
    $respuesta=mysqli_query($conexion,$sentencia4);



//RECIBO

$id_admision =mysqli_query($conexion, "SELECT MAX(id_admision) FROM admision");
$id_admision1 = mysqli_fetch_array($id_admision);
              $id_admision_final=$id_admision1[0];

$fecha_actual = date("Y-m-d");
$sentencia3 ="INSERT INTO recibo (
  id_recibo,
  num_recibo,
  fecha_recibo,
  N_admision
  ) 
  VALUES (
   null,
  '$nro_recibo',
  '$fecha_actual',
  '$id_admision_final'
  );";
    $respuesta=mysqli_query($conexion,$sentencia3);


    if($respuesta!=false)
            {
              if(mysqli_affected_rows($conexion)!=0)
              {
                echo"<script>
                alert('LOS DATOS SE HAN GRABADO\\n Se a insertado ".mysqli_affected_rows($conexion)." registros');
                location='../view/listaAdmision.php';
                </script>";
              }
            }
              else
              echo "ERROR....";
              mysqli_close($conexion);
         
}  
    
?>