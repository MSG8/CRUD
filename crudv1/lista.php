<!DOCTYPE html>
<!-- Manuel Solís Gómez -->
<HTML>
	<head>
		<meta charset="UTF-8"/>
		<meta type="author" content="Manuel Solis Gomez"/>
		<meta type="description" content="Prueba de conectar base de dato y sacar un valor en concreto"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<title> Las Mujeres en la Histori de la Informatica </title>
		<link rel="stylesheet" type="text/css" href="css/estiloLista.css"/>
	</head>
  <body>
	<nav>
		<a href="anadir.php"> AÑADIR EMPLEADO</a>
	</nav>
    <main>
		<h2> LISTA DE EMPLEADOS </h2>
		<?php
			require('clases/lista.php'); //Modulado, asi llamara al codigo que requiero para la lista
		?>
    </main>
  </body>
</HTML>
