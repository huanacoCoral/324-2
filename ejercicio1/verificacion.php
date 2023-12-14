<table>
        <tr>
            <td>flujo</td>
            <td>Proceso</td>
            <td>ver</td>
            <td>ver Actividad</td>
        </tr>
        <?php 
	        while ($fila=mysqli_fetch_array($result)) {
	            echo "<tr>";
	            echo"<td>$fila[0]</td>";
	            echo"<td>$fila[1]</td>";
	            echo ' <td> <a href="http://localhost/A/examen%20324-3/kardexB.php?ci='. $fila[0] . '&nombre=' . $fila[1] . '&flujo='.$codFlujo.'&proceso='.$codProceso.'">ver</a> </td>';
	            echo "<tr>";
	        }
        ?>
</table>
<form>
	
</form>

<form action="busqueda.php" method="GET">
	<label >ci del estudiante </label>
	<input type="text" value="1"  name="ci"/>
	<input type="submit" value="BUSCAR" name= "Buscar" />
</form>

