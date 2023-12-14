 <?php 
 include "conexion.inc.php";
 

	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	$codProcesoSiguiente= $_GET["procesoSiguiente"];
	//$archivo=$_GET["archivo"]; 
	$ci=$_GET['ci'];
		if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
		{
			//sacamos de motor la consulta en sql
			$sql="select * from flujoproceso ";
			$sql.="where codFlujo= '$codFlujo'";
			$sql.=" and procesoSiguiente ='$codProceso'";//manda al siguiente proceso
		}
		if(isset($_GET["Siguiente"]))
		{
			include "guardar.php";
			$Condicionante="INSERT INTO FlujoProcesoCondicionante VALUES ('$codFlujo', '$codProceso','$ci',null, null)";
			//echo $Condicionante;
			mysqli_query($con, $Condicionante);

			$fecha= date('Y-m-d');
			$registrandoA="INSERT INTO procesoseguimientoactividad VALUES ('$codFlujo','$codProceso','$ci','$fecha', null)";
			mysqli_query($con, $registrandoA);

			$sql="select * from flujoproceso ";
			$sql.="where codFlujo= '$codFlujo'";
			$sql.=" and proceso ='$codProcesoSiguiente'";
			echo "se mando a la base de datos";
		}
			$result=mysqli_query($con, $sql); 
			$fila= mysqli_fetch_array($result);

			$codprocesoEnvia=$fila['proceso'];

			$archivoEnvia="principal.php";
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);
	
?>