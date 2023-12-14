solicitud
<?php
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];

	include "conexion.inc.php";//contiene la lógica de conexión a la base de datos	
	$sql="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	$result=mysqli_query($con, $sql); //Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query.
	$fila= mysqli_fetch_array($result);//Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query. CONVEIRTE EN ARRAY
	$codprocesosiguiente=$fila['procesoSiguiente'];//saca codP.Siguiete del los valores extraidosen fila
	//echo $codprocesosiguiente."pspsps";
	$archivo=$fila['pantalla'];

	$archivo.=".php";
	//echo $archivo;// IMPRIME //ESTO NO LE VA A LA PAGINA Q DICE 
?>

<head>
	<link rel="stylesheet" type="text/css" href="estilo.css">
    <title>ingreso de datos </title>
</head>
<body>
	

	<form action="controladorInicio.php" method="GET">
    
		<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" /><!--//**** hidden incluir datos sin q el ususario lo sepa, MOSTRARA EL VALOR DE CODIGO FLUJO-->
	    <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso"/>
	    <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name= "procesoSiguiente" />
		
		<input type="hidden" value="<?php echo $archivo; ?>" name= "archivo" />
		
		<h2>Formulario </h2>
		<p>ingresa solicitud</p>
	<p>ingresa tu informacion para ser revisada</p>
	        <label for="nombre">Nombre:</label>
	        <input type="text" value="x"  name="nombre"/>
	        <br>
	        <label for="nombre">Ci:</label>
	        <input type="text" value="33"  name="ci"/>
	         <br>
	        <label for="archivo">Selecciona un archivo PDF:</label>
	        <input type="file" name="archivo" id="archivo" accept=".pdf">

	        <!--<label for="tema">fotocopia legalizada de diploma de bachiller:</label>
	        <textarea id="tema" name="ci" rows="4" ></textarea>
	 	 	<br>
	        <label for="tema">Certificado de Conclusion de Estudios :</label>
	        <textarea id="tema" name="ci" rows="4" ></textarea>
	         <br>
	         <label for="tema">papeleta valorada de Tesoro Universitario:</label>
	        <textarea id="tema" name="ci" rows="4" ></textarea>
	        <br>
	        <?php
			// Obtener la fecha actual
			$fechaActual = date("Y-m-d");
			// Obtener la fecha y hora actual
			$HoraActual = date("H:i");
			?>
			<input type="hidden" value="<?php echo $fechaActual; ?>" name="fecha"/>
	    	<input type="hidden" value="<?php echo $HoraActual; ?>" name="hora"/>-->

    <input type="submit" value="Siguiente" name= "Siguiente" />
    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->

</form>
    <form action="principal.php" method="GET">
         <input type="submit" value="Anterior" name= "Admi" />
    </form>
	


</body>
</html>


