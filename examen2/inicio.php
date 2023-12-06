<?php
	$codFlujo=$_GET['flujo'];//asignando el valor del parámetro.GEt Es una superglobal,para recoger datos enviados a la página a través de la URL.
	$codProceso=$_GET['proceso'];
//lo de ejemplo.php
	include "conexion.inc.php";//contiene la lógica de conexión a la base de datos	
	$sql="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
	$result=mysqli_query($con, $sql); //Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query.
	$fila= mysqli_fetch_array($result);//Ejecuta una consulta SQL en la base de datos utilizando la función mysqli_query. CONVEIRTE EN ARRAY
	$codprocesosiguiente=$fila['procesoSiguiente'];//saca codP.Siguiete del los valores extraidosen fila
	echo $codprocesosiguiente."pspsps";
	$archivo=$fila['pantalla'];//Asigna el valor de la columna codFlujo de la fila obtenida a la variable
	$archivo.=".php";
	echo $archivo;// IMPRIME //ESTO NO LE VA A LA PAGINA Q DICE 
	

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ingreso de Temas de Tesis</title>
   <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<p>Envio de tema disponible</p>


	<form action="controladorinicio.php" method="GET">
    <!-- Este formulario envía datos al archivo "controlador.php" usando el método GET -->

	 <!--///****/ mostrara datos en el URL eje:http://localhost/A/ap2 //controlador.php?codflujo+a+mostrar+=F1&codproceso=P1&Anterior=Anterior******-->
	<input type="hidden" value="<?php echo $codFlujo; ?>" name="flujo" /><!--//**** hidden incluir datos sin q el ususario lo sepa, MOSTRARA EL VALOR DE CODIGO FLUJO-->
    <input type="hidden" value="<?php echo $codProceso; ?>" name="proceso"/>
    <input type="hidden" value="<?php echo $codprocesosiguiente; ?>" name= "ProcesoSiguiente" />
	
	<input type="hidden" value="<?php echo $archivo; ?>" name= "archivo" />//nota para ver q hace inspeccionar pagina
	
	<h2>Formulario de Temas de Tesis</h2>
        <label for="nombre">Nombre:</label>
        <!---temas por defecto http://localhost/A/examen2/controladorinicio.php?flujo=F2&proceso=P1&ProcesoSiguiente=P2&archivo=inicio.php&nombre=mdaf&tema=123&Siguiente=Siguiente-->
        <input type="text" value="mMet"  name="nombre"/>

        <label for="nombre">ID:</label>
        <input type="text" value="333"  name="ci"/>

        <label for="tema">Tema de Tesis:</label>
        <textarea id="tema" name="tema" rows="4" required></textarea>
        <?php
		// Obtener la fecha actual
		$fechaActual = date("Y-m-d");
		// Obtener la fecha y hora actual
		$HoraActual = date("H:i");

		?>
		<input type="hidden" value="<?php echo $fechaActual; ?>" name="fecha"/>
    	<input type="hidden" value="<?php echo $HoraActual; ?>" name="hora"/>

    <input type="submit" value="Siguiente" name= "Siguiente" />
    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->

</form>
    <form action="controladorAdmi.php" method="GET">
         <input type="submit" value="Adminitracion" name= "Admi" />
    </form>
	


</body>
</html>


