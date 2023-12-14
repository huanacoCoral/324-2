<?php 
$codProceso= $_GET['proceso'];
$codFlujo=$_GET['flujo'];
$ci=$_GET['ci'];
$nombre=$_GET['nombre'];
?>
<html>
<body>
	<h1>SELLO y firma </h1>
	<h2>ingrese sus datos:</h2> 
	<form action="principal.php" method="GET">
	        
	</form>
	<h2>Formulario Sello Firma </h2>
	<form action="controlverificacion.php" method="GET">
		<label >Nombre del autorizador:</label>
	        <input type="text" value="x"  name="nombre"/>
	        <br>
	        <label >Ci del autorizador:</label>
	        <input type="text" value="33"  name="ci"/>
	         <br>
	         
	         <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso" />

 		<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" />
		<input type="submit" value="Siguiente" name= "Siguiente" />
	    <input type="submit" value="Anterior" name= "Anterior" />
	</form>
<h1>***********</h1>
</body>
</html>