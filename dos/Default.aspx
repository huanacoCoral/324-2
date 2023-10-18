<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }



        section {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <form action="http://localhost/pregunta1/" method="post">
        <section>
        usuario
        <input type="text" name="usuario" value=""/>
        <br />
        <li>contraseña</li>
        <input type="password" name="contraseña" value=""/>
        <br />
        <input type="submit" name="aceptar" value="Aceptar"/>
        </section>
    </form>
</body>
</html>