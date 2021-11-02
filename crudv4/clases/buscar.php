<?php
    function buscar()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        if (isset($_POST["acepta"]) AND $listaValores = $informacion->buscarDni($_POST['dni'])== true)  // si se a pulsado el input de acepta y su busqueda existe, muestra el empleado
        {
            $fila = $listaValores->fetch_row(); //saco la fila deseada
            require('formulario/verEmpleado.php'); //formulario que muestra el usuario 
            formulario($fila,'EMPLEADO BUSCADO'); //SE ENTRA LA FILA QUE DESEAMOS VER Y SU TITULO
        }
        else // si no vuelve a pedir los datos
        {
            //FORMULARIO DE BUSQUEDA
            echo 
            '<section>
                <form action="" method="post" >
                    <h2> BUSQUEDA DE EMPLEADO </h2>
                    <div>
                        <label for="dni"> DNI </label>
                        <input type="text" name="dni" value="'.$fila[1].'" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" required="required" />
                    </div>
                    <input type="submit" value="BUSCAR" name="acepta" />
                    <a href="index.php"><input type="button" value="CANCELAR"/></a>
                </form>
            </section>';
            
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

    buscar();
?>