<html>
<head>
	 <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
	//$archivo="averigua.inc.php";
//localhost/A/ap2/motor.php?codflujo=F1&codproceso=P1 EN LA PAGINA WEB
	$codFlujo=$_GET['flujo'];
	$codProceso=$_GET['proceso'];
	include "conexion.inc.php";//contiene la lógica de conexión a la base de datos
	$sql="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	$result=mysqli_query($con, $sql); 
	$fila= mysqli_fetch_array($result);
	//$codprocesosiguiente=$fila['procesoSiguiente'];

	$archivo=$fila['pantalla'];//Asigna el valor de la columna codFlujo de la fila obtenida a la variable
	$archivo.=".php";
	
?>
<body>
	<h1>Motor de revision </h1>
<br>

<form action="principal.php" method="GET">
    <!-- Este formulario envía datos al archivo "controlador.php" usando el método GET -->
    
    <?php
   // echo $archivo;
	include $archivo;
	?>
	 <!--///****/ mostrara datos en el URL eje:http://localhost/A/ap2 //controlador.php?codflujo+a+mostrar+=F1&codproceso=P1&Anterior=Anterior******-->
	<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" /><!--//**** hidden incluir datos sin q el ususario lo sepa, MOSTRARA EL VALOR DE CODIGO FLUJO-->
    <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso"/>
    <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name= "ProcesoSiguiente" />
	
	<input type="hidden" value="<?php echo $archivo; ?>" name= "archivo" />

	<input type="submit" value="Salir" name="Anterior" />

    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->
    
</form>
</body>
<html>