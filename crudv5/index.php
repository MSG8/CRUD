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
                    <li> <a href="clases/direc.php?op=buscarDni"> BUSCAR DNI </a> </li>
                    <li> <a href="clases/direc.php?op=buscarNombre"> BUSCAR NOMBRE </a> </li>
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
                                require('clases/borrar.php'); //Modulado, asi llamara al codigo que requiero para borrar
                                break;
                            
                            case 'mirar':
                                require('clases/mirar.php'); //Modulado, asi llamara al codigo que requiero para ver un empleado
                                break;
    
                            case 'modificar':
                                require('clases/modificar.php'); //Modulado, asi llamara al codigo que requiero para modificar un empleado
                                break;
    
                            case 'buscarDni':
                                require('clases/buscarDni.php'); //Modulado, asi llamara al codigo que requiero para buscar por dni
                                break;
                            
                            case 'buscarNombre':
                                require('clases/buscarNombre.php'); //Modulado, asi llamara al codigo que requiero para buscar por
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
            
            if ($_GET['op']== 'buscarNombre' AND isset($_POST["acepta"])) 
            {
                echo ('<link rel="stylesheet" type="text/css" href="css/estiloLista.css">');
            }
            else 
            {
                echo ('<link rel="stylesheet" type="text/css" href="css/estiloFormulario.css">');
            }
        }
        else
        {
            echo ('<link rel="stylesheet" type="text/css" href="css/estiloLista.css">');
        }
    }
?>