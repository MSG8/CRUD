<?php
require('crud.php');

$informacion = new Crud();

$listaValores = $informacion->lista();

while ($fila = $listaValores->fetch_row())//llamamos a cada fila del array de toda la base de datos
{
  echo //creara una seccion de la informacion de cada empleado, ademas de guardar cual es su id en los botones
    '<section>
      <p> '.$fila[1].' </p>
      <p> '.$fila[2].' </p>
      <a href="borrar.php?id='.$fila[0].'"><img src="imagenes/papelera.png" alt="borrar empleado"/></a>
      <a href="modificar.php?id='.$fila[0].'"><img src="imagenes/papel.png" alt="modificar empleado"/></a>
      <a href="mirar.php?id='.$fila[0].'"><img src="imagenes/lupa.png" alt="ver empleado"/></a>
    </section>';
}

$informacion->cerrar();
?>