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

<body>
	<h3>Pagina de aprobacion</h3>
	<p>tema concluido con exito</p>
 <div class="contenedor">
    
        <h2>Información del Alumno</h2>
        <div class="detalle">
            <label>Nombre:</label> <span><?php echo $_SESSION['nombre']; ?></span>
        </div>
        <div class="detalle">
            <label>TEMA:</label> <span><?php echo $_SESSION['tema']; ?></span>
        </div>
       	
    </div>
    

</body>
</html>