<?php

$db_host="localhost";
$db_user="root";
$db_pass=""; 
$db_name="admision1.1";

$conexion=mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die ("ERROR            DE CONEXION");

mysqli_set_charset($conexion,"utf8");
