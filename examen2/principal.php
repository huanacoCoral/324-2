<?php 
//motor
include "conexion.inc.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convocatoria Universidad de la Ternura</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            text-align: center;
            margin: 20px;
        }

        header {
            background-color: #ffcccb;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            color: #e44d26;
        }

        section {
            margin-top: 20px;
        }

        p {
            line-height: 1.6;
        }

        footer {
            margin-top: 20px;
            background-color: #ffcccb;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>¡Bienvenidos a la universidad X</h1>
        <p>Donde el conocimiento se fusiona con uno mismo</p>
    </header>

    <section>
        <h2>Convocatoria Abierta</h2>
        <p>Amidst the shadows of the night,
Where moonbeams gently cast their light,
A whisper dances in the breeze,.</p>
        <p>The stars above, a shimmering sea,
Each twinkle holds a mystery,</p>
        <!-- Agrega más contenido según sea necesario -->
    </section>

    <section>
        <h2>¿Listo para unirte a nosotros?</h2>
        <p>La convocatoria está abierta. ¡Apúntate y únete a nosotros !</p>
    </section>
    <!---De la pregunta anterior (diagrama de procesos) en PHP realice un proceso (elija uno) con sus interfaces respectivas y validaciones (personalice su presentación, minimo 5 procesos).-->

    <form action="inicio.php" method="GET">
	<input type="hidden" value="F2" name="flujo" />
    <input type="hidden" value="P1" name="proceso"/>

        <!--<form action="inicio.php" method="get"> <!-- mejor explicaion no hya-->
    	    <input type="submit" value="Entrar"  name="pagina inicio" />
    	<!--</form>-->
    </form>
    <!-- Crea un botón de envío con el texto "Anterior- Siguiente" -->
    <footer>
        <p>© 2023 Universidad de la X. Todos los derechos reservados.</p>
    </footer>

</body>
</html>


