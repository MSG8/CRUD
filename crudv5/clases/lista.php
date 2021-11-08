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

    while ($fila = $listaValores->fetch_assoc())//llamamos a cada fila del array de toda las filas de la tabla 
    {
      echo 
      '<section>
        <p> '.$fila['nombre'].' </p>
        <p> '.$fila['dni'].' </p>
        <div><a href="clases/direc.php?id='.$fila['id'].'&op=borrar"><img src="imagenes/papelera.png" alt="borrar empleado"/></a></div>
        <div><a href="clases/direc.php?id='.$fila['id'].'&op=modificar"><img src="imagenes/papel.png" alt="modificar empleado"/></a></div>
        <div><a href="clases/direc.php?id='.$fila['id'].'&op=mirar"><img src="imagenes/lupa.png" alt="ver empleado"/></a></div>
      </section>';
    }
    if ($informacion->filasResultado() <= 0) //si la base de dato no tiene empleados mostrara esta informacion
    {
      echo 
        '<div id="aviso">
            <p>
                NO HAY EMPLEADOS EN ALTA
            </p>
        </div>';
    }
    
    echo '<a href="clases/direc.php?op=anadir" id="anadir"> AÑADIR EMPLEADO </a>';

    $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
  }

  lista();
?>