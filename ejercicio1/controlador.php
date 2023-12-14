 <?php // explicaion en motor
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	$codProcesoSiguiente= $_GET["procesoSiguiente"];//debe estar como muestra en el 	
	$archivo=$_GET["archivo"]; 
	if ($codProceso=="P3") {
		if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and procesoSiguiente ='$codProceso'";
			}
			if(isset($_GET["Siguiente"]))
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo='$codFlujo'";
				$sql.=" and proceso ='P1'";
			}
			include "conexion.inc.php";
			$result=mysqli_query($con, $sql); 
			$fila= mysqli_fetch_array($result);

			$codprocesoEnvia=$fila['proceso'];
			$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);//Significa que, después de ejecutar esta línea de 
	} else {
		if ($codProceso!="P7")
		 {
			if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and procesoSiguiente ='$codProceso'";
			}
			if(isset($_GET["Siguiente"]))
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and proceso ='$codProcesoSiguiente'";
			}
			include "conexion.inc.php";
			$result=mysqli_query($con, $sql); 
			$fila= mysqli_fetch_array($result);
			$codprocesoEnvia=$fila['proceso'];
			$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
			echo $archivoEnvia;
			//header("Location: ".$archivoEnvia);
		} else {
			//$archivoEnvia="defenza.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
			//echo $archivoEnvia;
			//header("Location: ".$archivoEnvia);
		}
	}
	
?>