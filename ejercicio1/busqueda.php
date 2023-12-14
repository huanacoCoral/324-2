bus
<?php 
include "conexion.inc.php";
$ci=$_GET['ci'];
$sql="select * from procesoseguimientoactividad where IDEstudiante=".$ci;
$result=mysqli_query($con, $sql); 
$fila= mysqli_fetch_array($result);
?>
<table>
        <tr>
            <td>flujo</td>
            <td>Proceso</td>
            <td>ID EStudiante</td>
            <td>Fecha Inicio</td>
            <td>Fecha Fin</td>
        </tr>
        <?php 
	        while ($fila=mysqli_fetch_array($result)) {
	            echo "<tr>";
	            echo"<td>$fila[0]</td>";
	            echo"<td>$fila[1]</td>";
	            echo"<td>$fila[2]</td>";
	            echo"<td>$fila[3]</td>";

	            echo"<td>$fila[4]</td>";
	            echo "<tr>";
	        }
        ?>
</table>
<form action="motorKArdex.php">
 	 	 <input type="hidden" value="P2" name="proceso" />

 		<input type="hidden" value="F1" name="flujo" />
 	 	<input type="submit" value="verificacion" name= "verificacion" />
 	 </form>