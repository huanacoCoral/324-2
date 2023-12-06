<html>
<head>
	 <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<?php
	$codFlujo=$_GET['flujo'];//asignando el valor del parámetro.GEt Es una superglobal,para recoger datos enviados a la página a través de la URL.
	$codProceso=$_GET['proceso'];
//lo de ejemplo.php
	include "conexion.inc.php";//contiene la lógica de conexión a la base de datos
	$sql="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	$result=mysqli_query($con, $sql); //Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query.
	$fila= mysqli_fetch_array($result);//Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query. CONVEIRTE EN ARRAY
	$codprocesosiguiente=$fila['procesoSiguiente'];//saca codP.Siguiete del los valores extraidosen fila

	$archivo=$fila['pantalla'];//Asigna el valor de la columna codFlujo de la fila obtenida a la variable
	$archivo=$archivo.".php";
	echo $archivo;// IMPRIME //ESTO NO LEVA A LA PAGINA Q DICE 

?>
<body>
	Segunda forma de llamar
	<h1>Motor de flujo</h1>
<br>

<form action="controlador.php" method="GET">
    <!-- Este formulario envía datos al archivo "controlador.php" usando el método GET -->
    ****
    <!-- Muestra un mensaje de texto en el formulario -->
    <?php
	include $archivo;
	?>
	 <!--///****/ mostrara datos en el URL eje:http://localhost/A/ap2 //controlador.php?codflujo+a+mostrar+=F1&codproceso=P1&Anterior=Anterior******-->
	<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" /><!--//**** hidden incluir datos sin q el ususario lo sepa, MOSTRARA EL VALOR DE CODIGO FLUJO-->
    <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso"/>
    <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name= "procesoSiguiente" />
	
	<input type="hidden" value="<?php echo $archivo; ?>" name= "archivo" />//nota para ver q hace inspeccionar pagina

	<input type="submit" value="Anterior" name="Anterior" />
    <input type="submit" value="Siguiente" name= "Siguiente" />
    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->
</form>
</body>
<html>