<?php
    function buscar()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        if (isset($_POST["acepta"]))  // si se a realizado bien la busqueda y es mayor a 0 filas, te mostrara el empleado
        {
            $listaValores = $informacion->buscarNombre($_POST['nombre']);
            if ($informacion->filasResultado() > 0) 
            {
                echo
                '<div> 
                    <h2> EMPLEADOS BUSCADOS </h2> 
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
            }
            else  // si se ha pulsado ya el acepta pero el buscar es false, es por un error 
            {
                echo $informacion->numeroError();
                if ($informacion->numeroError() == 0) 
                {
                    echo 
                    '<div id="aviso">
                        <p>
                            NO SE ENCUENTRA NINGUN EMPLEADO CON ESE NOMBRE
                        </p>
                    </div>';
                }
                else 
                {
                    echo 
                    '<div id="aviso">
                        <p>
                            ERROR NO IDENTIFICADO
                        </p>
                    </div>';
                }
            }
            echo '<a href="index.php" id="anadir"> LISTADO </a>';
        }
        else // si no vuelve a pedir los datos
        {
            //FORMULARIO DE BUSQUEDA
            require('formulario/buscarEmpleado.php');
            formulario('nombre');
        }

        $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
    }
    buscar();
?>