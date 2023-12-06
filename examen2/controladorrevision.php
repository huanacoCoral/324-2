 <?php // explicaion en motor
 session_start();
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	//$codProcesoSiguiente= $_GET["ProcesoSiguiente"];//debe estar como muestra en el 
	
	$archivo=$_GET["archivo"]; // extraemos el archivo que manda el motor
	//include "controlador".$archivo;// solicitara que envie ese archivo
	
	$codprocesoEnvia=$_GET["ProcesoSiguiente"];
	echo "***".$codprocesoEnvia;
		echo $codProceso."actual - ";

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
		$sql.=" and proceso ='$codprocesoEnvia'";
	}
	include "conexion.inc.php";
	//echo $sql;
	$result=mysqli_query($con, $sql); 
	$fila= mysqli_fetch_array($result);

	if($codprocesoEnvia=="P4")
	{
		echo "Aceptado ";
		$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
		header("Location: ".$archivoEnvia);
	}
	else
	{
		echo "Rechazado ";	
		$archivoEnvia="motorR.php? flujo=".$codFlujo."&proceso=P3";
		header("Location: ".$archivoEnvia);
	}
	
	// esta conectando con la anterior pagina y comparando url
	//$archivoEnvia="motor.php?flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
	//$archivoEnvia.="&fecha=".$fecha."&hora=".$hora;//Esta cadena representa una URL con parámetros de consulta que podrían ser utilizados en una solicitud (esta solicitando los datos enviados)

	//echo $archivoEnvia."--------";
	//header("Location: ".$archivoEnvia);//Significa que, después de ejecutar esta línea de código, el navegador del usuario será redirigido a la URL especificada en $archivoEnvia
?>
