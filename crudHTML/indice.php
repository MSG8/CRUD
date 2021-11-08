<!DOCTYPE html>
<!-- Manuel Solís Gómez -->
<HTML>
	<head>
		<meta charset="UTF-8"/>
		<meta type="author" content="Manuel Solis Gomez"/>
		<meta type="description" content="Pagina para modificar informacion de empleados de una empresa"/>
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.8, maximum-scale=2.0, minimum-scale=0.8"/>
		<title> Administrador de empleados </title>
		<link rel="stylesheet" type="text/css" href="css/trabajoPorcentaje.css">
        <?php css(); //Funcion usada para colocar el css especifico segun los elementos html  ?> 
	</head>
	<body>
        <header>

        </header>
        <nav>

        </nav>
        <main>
            <nav>
                <ul>
                    <li> <a href="clases/direc.php?op=lista"> LISTA EMPLEADOS </a> </li>
                    <li> <a href="clases/direc.php?op=anadir"> AÑADIR EMPLEADO </a> </li>
                    <li> <a href="clases/direc.php?op=buscarDni"> BUSCAR DNI </a> </li>
                    <li> <a href="clases/direc.php?op=buscarNombre"> BUSCAR NOMBRE </a> </li>
                </ul>
            </nav>
            <article>
                <!-- segun lo que llegue por get o post se coloca una lista o un formulario -->
            </article>
        </main>
        <footer>

        </footer>
	</body>
</HTML>
<?php
    function css()
    {
        if (isset($_GET['op'])) 
        {
            echo ('<link rel="stylesheet" type="text/css" href="css/estiloFormulario.css">');
        }
        else
        {
            echo ('<link rel="stylesheet" type="text/css" href="css/estiloLista.css">');
        }
    }
?>