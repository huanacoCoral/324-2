 <?php // explicaion en motor
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];

	$archivoEnvia="solicitud.php? flujo=".$codFlujo."&proceso=".$codProceso;		
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);	
?>