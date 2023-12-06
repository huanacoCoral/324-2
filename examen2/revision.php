
<?php
session_start();
$codFlujo=$_GET['flujo'];//asignando el valor del parámetro.GEt Es una superglobal,para recoger datos enviados a la página a través de la URL.
$codProceso=$_GET['proceso'];


$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
//insertando dato
$sql = "INSERT INTO FlujoProcesoSeguimientoActividad ";
$sql .= "VALUES ('$codFlujo', '$codProceso', '" . $_SESSION['tema'] . "', '" . $_SESSION['nombre'] . "', '$fecha', '$hora', null, null)";
//echo "insertando datos: ".$sql;
include "conexion.inc.php";
  mysqli_query($con, $sql); 
  //DELETE FROM `flujoprocesoseguimientoactividad` WHERE `Estudiante` = "mMet"; borrar datos 
?>
<html lang="es">

<body>

    <div class="contenedor">
    revision
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