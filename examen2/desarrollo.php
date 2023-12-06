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
<html >

<body>
    <label for="select-fields">Temas de consulta :</label>
    <p><input type="text" id="select-fields" placeholder="Campo1, Campo2, ..."></p>

    <p><label for="from-table">Detalle de consulta :</label></p>
    <p><input type="text" id="from-table" placeholder="detalle"></p>

    

    <textarea id="result" placeholder="Resumen de consulta" readonly></textarea>

    </script>
</body>
</html>
