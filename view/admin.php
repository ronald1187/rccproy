<?php require_once('../class/menu.php');?>
<?php require_once('../config/conexion.php');

session_start();
if(isset($_SESSION['nombredelusuario']))
{
$usuarioingresado = $_SESSION['nombredelusuario'];
	echo "<h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location:../login/login.php');
}
?>
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">
    <script src="../Style/bootstrap/dist/js/bootstrap.min.js"></script>
<form method="POST">
<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../login/login.php');
}
	
?>

<div>
		<!--Formulario para registrar -->
        <form id="frmregistrar" class="grupo-entradas" method="POST" action="../log/log.php">
        <input type="text" class="cajaentradatexto" placeholder="Ingresar usuario" required 
		name="txtusuario">
        <input type="password" class="cajaentradatexto" placeholder="&#128274 Ingresar contraseña" required name="txtpassword">
        <button type="submit" class="botonenviar" name="btnregistrarx">Registrar Usuario</button>
        </form>
        <!-- eliminar-->
        <form id="frmeliminar" class="grupo-entradas" method="POST" action="../class/log.php">
        <input type="text" class="cajaentradatexto" placeholder="Inserte ID o nombre" required 
		name="txteliminar">
        <div class="btn-group btn-group-sm">
            <button type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_eliminar" name="btn_eliminar">Eliminar Usuario</button>
        </div>
        </form>
<!-- MOSTRAR LISTA DE LOS REGISTRADOS -->
<form method="POST" action="" class="container" >
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
        </section><br>

        <div class="btn-group btn-group-sm">
            <button type="submit" class="btn btn-primary btn-h-8 px-5 ml-4" id="btn_buscar" name="btn_buscar">Buscar</button>
        </div>
    </div>
<!--BUSCAR -->
<?php require_once('../class/buscar_empleados.php');?>

<script src="../Style/iconify.min.js"></script>

</div>