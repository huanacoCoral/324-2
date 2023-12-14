<?php 
include "conexion.inc.php";
$codFlujo=$_GET['flujo'];
$codProceso=$_GET['proceso'];
$ci=$_GET['ci'];
$nombre=$_GET['nombre'];
$sql="SELECT * FROM `flujoprocesocondicionante`where IDEstudiante='$ci'";
//echo $sql;
$result=mysqli_query($con, $sql); 
$fila= mysqli_fetch_array($result);
 ?>
 <body>
 	
<h1>Datos </h1>
	 <?php 
		echo "CI: ".$ci;
		echo "   ----->>  ";
		echo "nombre:".$nombre;
	  ?>
 <form action="controlverificacion.php" method="GET">
 		<input type="hidden" value="<?php echo $ci; ?>" name="ci" />
 		<input type="hidden" value="<?php echo $nombre; ?>" name="nombre" />

 		<input type="hidden" value="<?php echo $codProceso; ?>" name="proceso" />

 		<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" />

 	<input type="submit" value="Siguiente" name= "Siguiente" />
 	<input type="submit" value="Anterior" name= "Anterior" />
 	<input type="submit" value="Rechazar" name= "Rechazar" />
 </form>
 </body>