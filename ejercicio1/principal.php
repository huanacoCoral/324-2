
<html>
<head>
	<style>
		html, body {
    height: 0%;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 250; /* Remove default margin */
}

form {
    margin: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   
    box-sizing: border-box; /* Include padding and border in the height calculation */
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="text"] {
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    width: 100%;
}

input[type="hidden"] {
    display: none;
}

	</style>

</head>
<body>
	<form action="controladorIni.php" method="GET">
		<input type="hidden" value="F1" name="flujo" />
	    <input type="hidden" value="P1" name="proceso"/>
	    <input type="submit" value="Nuevo" name= "Siguiente" />
	</form>

	<form action="entregaE.php" method="GET">
		<input type="text" value=" " name="ci" />
		<input type="text" value=" " name="nombre" />
	    <input type="submit" value="Estudiante" name= "Revision" />
	</form>

	<form action="motorKardex.php" method="GET">
		<input type="hidden" value="F1" name="flujo" />
	    <input type="hidden" value="P2" name="proceso"/>
	    <input type="submit" value="kardex" name= "Kardex" />
	</form>

</body>
</html>