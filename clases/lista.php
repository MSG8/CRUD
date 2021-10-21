<?php
  function lista()
  {
    require('crud.php'); //buscamos el archivo necesario
    $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
    $listaValores = $informacion->lista();  //llamamos al metodo que devuelve todas las filas de los empleados

    while ($fila = $listaValores->fetch_row())//llamamos a cada fila del array de toda las filas de la tabla 
    {
      echo 
        '<section>
          <p> '.$fila[1].' </p>
          <p> '.$fila[2].' </p>
          <a href="borrar.php?id='.$fila[0].'"><img src="imagenes/papelera.png" alt="borrar empleado"/></a>
          <a href="modificar.php?id='.$fila[0].'"><img src="imagenes/papel.png" alt="modificar empleado"/></a>
          <a href="mirar.php?id='.$fila[0].'"><img src="imagenes/lupa.png" alt="ver empleado"/></a>
        </section>';
    }

    if ($listaValores->num_rows <= 0) //si la base de dato no tiene empleados mostrara esta informacion
    {
      echo 
        '<section id="aviso">
            <p>
                NO HAY EMPLEADOS EN ALTA
            </p>
        </section>';
    }

    $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
  }

  lista();
?>