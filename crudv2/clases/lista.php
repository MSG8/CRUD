<?php
  function lista()
  {
    require('crud.php'); //buscamos el archivo necesario
    $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
    $listaValores = $informacion->lista();  //llamamos al metodo que devuelve todas las filas de los empleados

    echo
        '<div> 
          <h2> LISTA DE EMPLEADOS </h2> 
        </div>';

    while ($fila = $listaValores->fetch_row())//llamamos a cada fila del array de toda las filas de la tabla 
    {
      echo 
        '<section>
          <p> '.$fila[1].' </p>
          <p> '.$fila[2].' </p>
          <a href="clases/direc.php?id='.$fila[0].'&op=borrar"><img src="imagenes/papelera.png" alt="borrar empleado"/></a>
          <a href="clases/direc.php?id='.$fila[0].'&op=modificar"><img src="imagenes/papel.png" alt="modificar empleado"/></a>
          <a href="clases/direc.php?id='.$fila[0].'&op=mirar"><img src="imagenes/lupa.png" alt="ver empleado"/></a>
        </section>';
    }

    if ($listaValores->num_rows <= 0) //si la base de dato no tiene empleados mostrara esta informacion
    {
      echo 
        '<div id="aviso">
            <p>
                NO HAY EMPLEADOS EN ALTA
            </p>
        </div>';
    }

    $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
  }

  lista();
?>