 <?php // explicaion en motor
 session_start();
 include "conexion.inc.php";
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	$codProcesoSiguiente= $_GET["ProcesoSiguiente"];//debe estar como muestra en el 
	
	$archivo=$_GET["archivo"]; // extraemos el archivo que manda el motor
	//include "controlador".$archivo;// solicitara que envie ese archivo
	$_SESSION['nombre']= $_GET["nombre"];//debe estar como muestra en el 
	$_SESSION['tema']= $_GET["tema"];
	$_SESSION['ci']= $_GET["ci"];
	$fecha=$_GET["fecha"];
	$hora=$_GET["hora"];

	$sql="INSERT INTO Alumno VALUES ('{$_SESSION['ci']}','{$_SESSION['nombre']}')";
	mysqli_query($con, $sql); 

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
	

	$result=mysqli_query($con, $sql); 
	$fila= mysqli_fetch_array($result);

	$codprocesoEnvia=$fila['proceso'];
	// esta conectando con la anterior pagina y comparando url
	$archivoEnvia="motorRevi.php?flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
	$archivoEnvia.="&fecha=".$fecha."&hora=".$hora;//Esta cadena representa una URL con parámetros de consulta que podrían ser utilizados en una solicitud (esta solicitando los datos enviados)
	echo $archivoEnvia;
	header("Location: ".$archivoEnvia);//Significa que, después de ejecutar esta línea de código, el navegador del usuario será redirigido a la URL especificada en $archivoEnvia
?>
