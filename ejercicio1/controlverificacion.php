<?php 
include "conexion.inc.php";
$ci=$_GET['ci'];
$nombre=$_GET['nombre'];
$codFlujo =$_GET['flujo'];
$codProceso =$_GET['proceso'];
$sqlS="select * from flujoproceso where codFlujo= '$codFlujo' and proceso ='$codProceso'";
$resultS=mysqli_query($con, $sqlS); 
$filaS= mysqli_fetch_array($resultS);
$codProcesoSiguiente=$filaS['procesoSiguiente'];
echo "estudainte ci: ".$ci;
$fecha= date('Y-m-d');
if ($codProceso=="P2") {
	if(isset($_GET["Siguiente"]))//si existe en el URL un Anteriors
			{

				$nuevoActividad="UPDATE procesoseguimientoactividad ";
				$nuevoActividad.="SET FechaFin='$fecha'";
				$nuevoActividad.="where IDEstudiante='$ci'";
				 mysqli_query($con, $nuevoActividad);

				$codProceso ="P4";
				//ACTUALIZANDO flujo de condicionante
				$Actsql="UPDATE `flujoprocesocondicionante`";
				$Actsql.="SET procesoPositivo='$codProceso'";
				$Actsql.="where IDEstudiante= '$ci'";
				 mysqli_query($con, $Actsql);
				 //GUARDANDO en aceptados
				$nuevoAceptado="INSERT INTO `aceptados`VALUES ('$ci','$nombre')";
				 mysqli_query($con, $nuevoAceptado);
				//$borrando= "DELETE FROM Estudiante WHERE IDEstudiante= ".$ci;
				//mysqli_query($con, $borrando);
				 //para cambiar de pagina creo pero nose 
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo='$codFlujo'";
				$sql.=" and procesoSiguiente ='P5'";
				echo $sql;
				$result=mysqli_query($con, $sql); 
				$fila= mysqli_fetch_array($result);
				$codprocesoEnvia=$fila['proceso'];
				$archivoEnvia="motorKardex.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia;
				echo $archivoEnvia;
				header("Location: ".$archivoEnvia);
			}
			if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				$archivoEnvia="motorKardex.php? flujo=F1&proceso=P2";
				echo $archivoEnvia;
				header("Location: ".$archivoEnvia);
			}
			if(isset($_GET["Rechazar"]))
			{
				$codProceso ="P3";
				//Actualizando 
				$sql1="UPDATE `flujoprocesocondicionante`";
				$sql1.="SET procesoPositivo='$codProceso'";
				$sql1.="where IDEstudiante= '$ci'";
				mysqli_query($con, $sql1);
				//guardando
				$nuevoRechazo="INSERT INTO `rechazados`VALUES ('$ci','$nombre')";
				mysqli_query($con, $nuevoRechazo);
				//borrando 
				$borrando= "DELETE FROM Estudiante WHERE IDEstudiante= ".$ci;
				mysqli_query($con, $borrando);

				$archivoEnvia="motor.php? flujo=".$codFlujo."&proceso=P3";
				//echo $archivoEnvia;
				header("Location: ".$archivoEnvia);

			}
	} else
	 {
	 	echo "entrando por falso";
		if(isset($_GET["Anterior"]))//si existe en el URL un Anteriors
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and procesoSiguiente ='$codProceso'";
			}
			if(isset($_GET["Siguiente"]))
			{
				$sql="select * from flujoproceso ";
				$sql.="where codFlujo= '$codFlujo'";
				$sql.=" and proceso ='$codProcesoSiguiente'";
			}
			$result=mysqli_query($con, $sql); 
			$fila= mysqli_fetch_array($result);
			$codprocesoEnvia=$fila['proceso'];
			$archivoEnvia="motorKardex.php? flujo=".$codFlujo."&proceso=".$codprocesoEnvia."&ci=".$ci;
			echo $archivoEnvia;
			header("Location: ".$archivoEnvia);
	}	
 ?>