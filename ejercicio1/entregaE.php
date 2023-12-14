<?php 
include "conexion.inc.php";
$ci=$_GET['ci'];
	$nombre=$_GET['nombre'];



	$sql1="SELECT * FROM `estudiante`where IDEstudiante= '$ci' and proceso ='$nombre'";
	$result1=mysqli_query($con, $sql1); 
	$fila1= mysqli_fetch_array($result1);
	$estudiante=$fila1['nombre'];
	//echo $codprocesosiguiente."pspsps";
	
 ?>

 <html>

 <body>
 	<?php 
 	if ($estudiante!=null) {
 		echo"aceptado ".$estudiante;
 	}
 	else{
 		echo"no aceptado ";
 	}
 	 ?>
 </body>
 </html>