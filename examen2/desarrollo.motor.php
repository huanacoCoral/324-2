<?php
session_start();
$_SESSION['nombre']=$_GET['nombre'];
 echo $_SESSION["nombre"];
?>