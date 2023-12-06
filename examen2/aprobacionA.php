<?php
session_start();
include "conexion.inc.php";
$ci=$_GET['ci'];
$nombre=$_GET['nombre'];


$sql = "SELECT * FROM `flujoprocesoseguimientoactividad` WHERE `Estudiante` = '$nombre'";
//echo $sql;
$result=mysqli_query($con, $sql);

?>
<head>
     <link rel="stylesheet" type="text/css" href="estilo.css">
     <head>
    
    <title>Tabla Tierna</title>
    <style>
       table {
            width: 110%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

       


        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
</head>
<body>
	
    <form action="cont.php" method="GET">

     <div class="contenedor">
         <h3>Accion</h3>
        
            <h2>Información del Alumno</h2>
            <div class="detalle">
                <label>Nombre:</label> <span><?php echo $_SESSION['nombre']; ?></span>
            </div>
            <div class="detalle">
                <label>TEMA:</label> <span><?php echo $_SESSION['tema']; ?></span>
            </div>
           	
    </div>
    <table>
        <tr>
            <td>flujo</td>
            <td>Proceso</td>
            <td>Tema</td>
            <td>Estudiante</td>
            <td>Fecha inicio</td>
            <td>fecha fin</td>
        </tr>
        <?php 
        while ($fila=mysqli_fetch_array($result)) {
            echo "<tr>";
            echo"<td>$fila[0]</td>";
            echo"<td>$fila[1]</td>";
            echo"<td>$fila[2]</td>";
            echo"<td>$fila[3]</td>";
            echo"<td>$fila[4]</td>";
            echo"<td>$fila[6]</td>";
            //echo"<td><a herf=''ver</td>";
            echo "<tr>";
        }
        ?>
    </table>
    <input type="submit" value="volver" name="Anterior" />
  <input type="submit" value="Salir" name="inicioV" />

    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->
    
</form>  

</body>
</html>
<html>
<?php 

?>
