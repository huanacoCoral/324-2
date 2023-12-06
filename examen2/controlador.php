 <?php // explicaion en motor
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	$codProcesoSiguiente= $_GET["procesoSiguiente"];//debe estar como muestra en el 
	
	$archivo=$_GET["archivo"]; // extraemos el archivo que manda el motor
	//include "controlador".$archivo;// solicitara que envie ese archivo
	if ($codProceso=="P4") {
		if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				
			$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=P1";
			header("Location: principal.php");
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
			// esta conectando con la anterior pagina y comparando url
			$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;//Esta cadena representa una URL con parámetros de consulta que podrían ser utilizados en una solicitud (esta solicitando los datos enviados)
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);//Significa que, después de ejecutar esta línea de 
	} else {
		if ($codProceso!="P7") {
			if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				//sacamos de motor la consulta en sql
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and procesoSiguiente ='$codProceso'";//manda al siguiente proceso
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
			// esta conectando con la anterior pagina y comparando url
			$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;//Esta cadena representa una URL con parámetros de consulta que podrían ser utilizados en una solicitud (esta solicitando los datos enviados)
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);//Significa que, después de ejecutar esta línea de código, el navegador del usuario será redirigido a la URL especificada en $archivoEnvia
		} else {
			$archivoEnvia="defenza.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);
		}
	}
	
?>