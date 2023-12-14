
<?php 
	include "conexion.inc.php";
$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];

$sql="SELECT * FROM `estudiante`";
$result=mysqli_query($con, $sql); 
$fila= mysqli_fetch_array($result);


	$sql1="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	$result1=mysqli_query($con, $sql1); 
	$fila1= mysqli_fetch_array($result1);
	$codprocesosiguiente=$fila1['procesoSiguiente'];
	//echo $codprocesosiguiente."pspsps";
	$archivo=$fila1['pantalla'];

	$archivo.=".php";
	echo "llamando ----> ".$archivo;

 ?>
 motorKArdex
 <form action="controladorverificacion.php" method="GET">
 	<?php 
 	echo "ENTRANDO A :   ".$archivo;
 	include $archivo;
 	 ?> 	 
 </form>
