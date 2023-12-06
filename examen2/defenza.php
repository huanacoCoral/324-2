<?php
session_start();
include "conexion.inc.php";
$codFlujo=$_GET['flujo'];//asignando el valor del parámetro.GEt Es una superglobal,para recoger datos enviados a la página a través de la URL.
$codProceso=$_GET['proceso'];
// Obtener la fecha actual
		$fechaActual = date("Y-m-d");
		// Obtener la fecha y hora actual
		$HoraActual = date("H:i");
//insertando dato
$sql1 = "INSERT INTO `flujoprocesocondicionante` ";
$sql1 .= "(`codFlujo`, `proceso`, `procesoPositivo`, `procesoNegativo`, `Estudiante`)  ";
$sql1 .= "VALUES  ('$codFlujo','$codProceso','NULL','$codProceso','{$_SESSION['nombre']}')";
mysqli_query($con, $sql1);
//echo "  ->codigo sql de condicionante : ".$sql1;
//insertando dato de 
$sql = "UPDATE `flujoprocesoseguimientoactividad` ";
$sql .= "SET `FechaFin`='$fechaActual', `HoraFin`='$HoraActual' ";
$sql .= "WHERE  `Estudiante`='{$_SESSION['nombre']}' AND `Tema`='{$_SESSION['tema']}'";

//echo " -->codigo sql actividad : ".$sql;
mysqli_query($con, $sql);
?>

<html>
<head>
    
    <title>Visor de Documento</title>
</head>

<body>
	<center>
    <h3>Pagina de defenza</h3>

    <p>El siguiente tema: </p>
    <p><?php echo $_SESSION['tema']  ?></p>
    <p>Estudiante: </p>
    <p><?php echo $_SESSION['nombre'] ?></p>
    <p></p>
    <p></p>
    <p></p>

    <a href="http://localhost/A/examen2/principal.php">Salir</a>
    </center>

</body>
</html>
