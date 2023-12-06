<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Tierna</title>
    <style>
     
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
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
<?php 
include "conexion.inc.php";
$sql="SELECT * FROM `alumno`";
$result=mysqli_query($con, $sql);
?>

<table>
	<tr>
		<td>CI</td>
		<td>NOMBRE</td>
		<td>VER ACTIVIDAD </td>
	</tr>
	<?php 
	while ($fila=mysqli_fetch_array($result)) {
		echo "<tr>";
		echo"<td>$fila[0]</td>";
		echo"<td>$fila[1]</td>";
		echo ' <td> <a href="http://localhost/A/examen2/aprobacionA.php?ci=' . $fila[0] . '&nombre=' . $fila[1] . '">ver</a> </td>';

		
		echo "</tr>";
	}
	?>
</table>


</html>

