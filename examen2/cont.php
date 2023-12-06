 <?php // explicaion en motor


	if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
	{
		$archivoEnvia="http://localhost/A/examen2/controladorAdmi.php?Admi=Adminitracion";
		header("Location: ".$archivoEnvia);
	}
	if(isset($_GET["inicioV"]))
	{
		
		$archivoEnvia="http://localhost/A/examen2/principal.php";
		header("Location: ".$archivoEnvia);
	}
	

	
?>

