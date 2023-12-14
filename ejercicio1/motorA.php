<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="estilo.css">-->
</head>
<?php
	$codFlujo=$_GET['flujo'];//asignando el valor del parámetro.GEt Es una superglobal,para recoger datos enviados a la página a través de la URL.
	$codProceso=$_GET['proceso'];

	include "conexion.inc.php";//contiene la lógica de conexión a la base de datos
	$sql="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	echo $sql;
	$result=mysqli_query($con, $sql); 

	$fila= mysqli_fetch_array($result);
	$codprocesosiguiente=$fila['procesoSiguiente'];//saca codP.Siguiete del los valores extraidosen fila

	$archivo=$fila['pantalla'];//Asigna el valor de la columna codFlujo de la fila obtenida a la variable
	$archivo=$archivo.".php";
	echo $archivo;// IMPRIME //ESTO NO LEVA A LA PAGINA Q DICE 

?>
<body>
	Segunda forma de llamar
	<h1>Motor de Verficacion</h1>
<br>

<form action="controladorInicio.php" method="GET">
    
	<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" />
    <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso"/>
    <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name= "procesoSiguiente" />
	<input type="hidden" value="<?php echo $archivo; ?>" name= "archivo" />
	<input type="submit" value="Anterior" name="Anterior" />
    <input type="submit" value="Siguiente" name= "Siguiente" />
</form>
</body>
<html>