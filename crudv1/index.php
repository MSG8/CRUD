<!DOCTYPE html>
<!-- Manuel Solís Gómez -->
<HTML>
	<head>
		<meta charset="UTF-8"/>
		<meta type="author" content="Manuel Solis Gomez"/>
		<meta type="description" content="Pagina de inicio de layout"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<title> Las Mujeres en la Histori de la Informatica </title>
        <!-- <link rel="stylesheet" type="text/css" href="css/estiloFormulario.css"> -->
        <link rel="stylesheet" type="text/css" href="css/estiloLista.css">
		<link rel="stylesheet" type="text/css" href="css/trabajoPx.css">
	</head>
	<body>
        <header>

        </header>
        <nav>
            <a href="anadir.php"> AÑADIR EMPLEADO</a>
        </nav>
        <main>
            <nav>
                <a href="anadir.php"> AÑADIR EMPLEADO</a>
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
