<?php 
include "conexion.inc.php";
session_start();

//$ciX=$_GET['ci'];
//$sql="select *from aceptados where id=".$ci;
//S$result1=mysqli_query($con, $sql); 
//$fila1= mysqli_fetch_array($result1);

 ?>

 <html>
 <head>
 </head>
 <body>
 	<?php 
 	echo"aceptado por: ";
 	 ?>

 	 <form></form>
 	 <form action="principal.php">
 	 	 <input type="hidden" value="P2" name="proceso" />

 		<input type="hidden" value="F1" name="flujo" />
 	 	<input type="submit" value="verificacion" name= "verificacion" />
 	 </form>
 </body>
 </html>