<?php
  include_once "../config/conexion.php";

  session_start();
  if(isset($_GET['cerrar_session'])){
    session_unset();
    session_destroy();
  }

  if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
      case 1:
        header('location: ../index.php');
        break;
      
      case 2:
        header('location: ../index.php');
        break;
        default:
    }
  }

  if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    $username=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];

    $consulta="SELECT * FROM users WHERE username='$username' AND password='$contraseña'";
    $query=mysqli_query($conexion,$consulta);

    if(mysqli_affected_rows($conexion)!=0){
      header('location: ../view/formAdmision.php');
    }
    else{
      //include_once "login.php";
      //echo "la contraseña es invalida";
      //echo"<script>
      //alert('LOS DATOS SE HAN GRABADO\\n Insertado ".mysqli_affected_rows($conexion)." ');
      //location='login.php';
      //</script>";
      
      echo "
      <div class='alert alert-danger d-flex align-items-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
      <div>
        An example danger alert with an icon
      </div>
      </div>";

    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../Style/bootstrap_icons/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="../assets/Imagenes/LogoESMAR.png">
    <title>Esmar</title>
    <link rel="stylesheet" href="../Style/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
    <section class="intro"style="background-image: url('../assets/Imagenes/fondologin.jpg'); background-repeat: no-repeat; background-size: cover; align: center;">
        <br>
          <form action="log.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card gradient-custom" style="border-radius: 1rem;">                        
                            <div class="my-md-8 card-body p-5">
                              <center>
                              <span class="bi bi-person-square" style="font-size:180px;">
                              </span>
                              </center><br><br><br>

                              <div class="form-floating mb-3">
                                  <input type="" class="form-control" name= "txtusuario" id="txtusuario" placeholder="Usuario" required>
                                  <label for="floatingInput">Usuario</label>
                              </div>

                              <div class="form-floating">
                                  <input type="password" class="form-control" name="txtpassword" id="txtpassword" placeholder="Contraseña" required>
                                  <label for="floatingPassword">Contraseña</label>
                              </div>
                              <br>
                              <div class="form- control d-grid">
                                <!--button type="submit" class="btn  btn-lg btn-primary btn-block" type="submit" onclick="this.form.action='validacion.php'">Ingresar</button-->
                                <button type="submit" class="btn  btn-lg btn-primary btn-block" type="submit" name="btnloginx">Ingresar</button>
                              </div>
                              <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
          </form>
    </section>
    
      <script src="../Style/iconify.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>