<?php 
//motor
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$sql="select * from flujoproceso where codFlujo='$flujo' and proceso='$proceso'"; 
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$pantalla= $fila['pantalla'];

?>