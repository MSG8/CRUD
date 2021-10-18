<!DOCTYPE html>
<!-- Manuel Solís Gómez -->
<HTML>
	<head>
		<meta charset="UTF-8"/>
		<meta type="author" content="Manuel Solis Gomez"/>
		<meta type="description" content="Prueba de conectar base de dato y sacar un valor en concreto"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
		<title> Las Mujeres en la Histori de la Informatica </title>
		<link rel="stylesheet" type="text/css" href="estilo.css"/>
	</head>
  <body>
      <form>
          <section>
              <nombre></nombre>
              <
          </section>
      </form>
    <?php
		require 'clases/crud.php';
        $datos = new Crud();
        var_dump($datos->conexion);
     ?>
  </body>
</HTML>
