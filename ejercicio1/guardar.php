<?php
$_SESSION['nombre']=$_GET['nombre'];
	$_SESSION['ci']=$_GET['ci'];
$sql = "INSERT INTO Estudiante VALUES ('" . $_SESSION['ci'] . "', '" . $_SESSION['nombre'] . "')";
		mysqli_query($con, $sql);
?>