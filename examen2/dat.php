 <?php
		// Obtener la fecha actual
		$fechaActual = date("Y-m-d");
		// Obtener la fecha y hora actual
		$HoraActual = date("H:i");
?>
aprobacion

<html lang="es">

<body>

    <form action="" method="GET">
    	<input type="hidden" value="<?php echo $fechaActual; ?>" name="fechaF"/>
    	<input type="hidden" value="<?php echo $HoraActual; ?>" name="horaF"/>
    </form>

</body>
</html>