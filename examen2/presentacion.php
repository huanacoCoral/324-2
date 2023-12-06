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
<head>  
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec;
            text-align: center;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        h1 {
            color: #e91e63;
        }


        label {
            background-color: #e91e63;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

        label:hover {
            background-color: #ff5c8d;
        }

        

    </style>
</head>
<body>
    <div class="container"> 
         <h1>Subir Archivo Kawaii</h1>
                
         <label for="archivo">Seleccionar Archivo</label>
            
         
    </div>
</body>
</html>

