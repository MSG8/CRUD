<!DOCTYPE html>
<!-- Manuel Solís Gómez -->
<HTML>
	<head>
		<meta charset="UTF-8"/>
		<meta type="author" content="Manuel Solis Gomez"/>
		<meta type="description" content="Pagina de inicio de layout"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<title> Las Mujeres en la Histori de la Informatica </title>
		<link rel="stylesheet" type="text/css" href="css/trabajoPx.css">
        <?php css(); ?>
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
                    <li> <a href="clases/direc.php?op=buscar"> BUSCAR DNI </a> </li>
                </ul>
            </nav>
            <article>
                <?php
                    if (isset($_GET['op'])) 
                    {
                        switch ($_GET['op']) 
                        {
                            case 'anadir':
                                require('clases/anadir.php'); //Modulado, asi llamara al codigo que requiero para la lista
                                break;
    
                            case 'borrar':
                                require('clases/borrar.php'); //Modulado, asi llamara al codigo que requiero para la lista
                                break;
                            
                            case 'mirar':
                                require('clases/mirar.php'); //Modulado, asi llamara al codigo que requiero para la lista
                                break;
    
                            case 'modificar':
                                require('clases/modificar.php'); //Modulado, asi llamara al codigo que requiero para la lista
                                break;
                        }
                    }
                    else
                    {
                        require('clases/lista.php'); //Modulado, asi llamara al codigo que requiero para la lista
                    }
                    
                ?>
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