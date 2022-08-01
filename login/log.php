<?php

require_once('../config/conexion.php');

$nombre = $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];


// INICIA LA SESION
if(isset($_POST["btnloginx"]))
{

$queryusuario = mysqli_query($conexion,"SELECT * FROM logins WHERE usuario_ = '$nombre'");
$nr 		= mysqli_num_rows($queryusuario); 
$mostrar	= mysqli_fetch_array($queryusuario); 
	
if (($nr == 1) && (password_verify($pass,$mostrar['pass'])) )
	{ 
		session_start();
		$_SESSION['nombredelusuario']=$nombre;
		header("Location: ../index.php");
	}
else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'login.php' </script>";
	}
}

//CIERRE DE SESSION
if(isset($_POST['btncerrar']))
{
    session_destroy();
    header('location: http://localhost:8080/Esmar/login/login.php');
}
 

//REGISTRAR USUARIO Y CONTRASEÑA
if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conexion,"SELECT * FROM logins WHERE usuario_ = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

if ($nr == 0)
{

	$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
	$queryregistrar = "INSERT INTO logins(usuario_, pass) values ('$nombre','$pass_fuerte')";
	

if(mysqli_query($conexion, $queryregistrar))
{
	echo "<script> alert('Usuario registrado: $nombre');window.location= '/view/admin.php' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".mysql_error($conexion);
}

}else
{
		echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= '/view/login.php' </script>";
}

}
//ELIMINAR USUARIOS
if(isset($_POST["btn_eliminar"]))
{
	$elimn= $_POST["txteliminar"];
	$query = "DELETE FROM logins WHERE id_login='$elimn'";
	$respuesta=mysqli_query($conexion,$query);

	if($respuesta!=false){
		if(mysqli_affected_rows($conexion)==0)
		{
			echo "NO HAY REGISTROS QUE ELIMINAR CON ESTE CRITERIO...!";
		}
		else{
			echo"<script>
			alert('REGISTRO ELIMINADO\\n SE HA ELIMINADO".mysqli_affected_rows($conexion)."registros');
			window.location='/view/admin.php';
			</script>";
		}
	}
	else
	echo "ERROR!";
	mysqli_close($conexion);
}
?>