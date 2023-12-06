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
$sql1 .= "VALUES  ('$codFlujo','$codProceso','$codProceso','NULL','{$_SESSION['nombre']}')";
mysqli_query($con, $sql1);
//echo "  ->codigo sql de condicionante : ".$sql1;

//insertando dato de 
$sql = "UPDATE `flujoprocesoseguimientoactividad` ";
$sql .= "SET `FechaFin`='$fechaActual', `HoraFin`='$HoraActual' ";
$sql .= "WHERE  `Estudiante`='{$_SESSION['nombre']}' AND `Tema`='{$_SESSION['tema']}'";

//echo "codigo sql: ".$sql;
mysqli_query($con, $sql);
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento Revision Final</title>
</head>
<body>
    <h1>Documento Subido</h1>

    <!-- Aquí se muestra el documento subido -->
    <embed src="C:\Users\huana\OneDrive\Escritorio\documentos\INF163 requerimientos 5 ieee830.pdf" type="application/pdf" width="100%" height="300px">

    <!-- Puedes agregar más contenido HTML según sea necesario -->

</body>
</html>