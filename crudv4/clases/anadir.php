<?php
    function anadir()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        if (isset($_POST["acepta"]) AND $informacion->anadir($_POST)== true)  // si se a pulsado el input de acepta y el añadir es verdadero, se hace
        {
            $listaValores = $informacion->buscarDni($_POST['dni']); //lo busca
            $fila = $listaValores->fetch_row(); //saco la fila actualizada, asi informa de que ya hay nuevo empleado
            require('formulario/verEmpleado.php'); //formulario que muestra el usuario nuevo
            formulario($fila,'EMPLEADO NUEVO'); //SE ENTRA LA FILA QUE DESEAMOS VER
            
        }
        else // si no vuelve a pedir los datos
        {
            require('formulario/anadirEmpleado.php'); // formulario a rellenar para crear un empleado
            if (isset($_POST["acepta"]) AND $informacion->anadir($_POST) == false)  // si se ha pulsado ya el acepta pero el añadir es false, es por un error de los datos de formualrio repetidos
            {
                if ($informacion->numeroError() == 1062) 
                {
                    echo 
                    '<div id="aviso">
                        <p>
                            HAS USADO UN DNI REPETIDO
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
        }

        $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
    }

    anadir();


?>