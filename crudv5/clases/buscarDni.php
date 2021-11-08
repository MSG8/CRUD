<?php
    function buscar()
    {
        require('crud.php'); //buscamos el archivo necesario
        $conexion = new Crud(); // creamos el objeto con los datos d ela base de datos
        if (isset($_POST["acepta"]) AND ($conexion->buscarDni($_POST['dni']))->fetch_assoc())  // si se a realizado bien la busqueda y es mayor a 0 filas, te mostrara el empleado
        {
            $listaValores = $conexion->buscarDni($_POST['dni']);
            $fila = $listaValores->fetch_assoc(); //saco la fila deseada
            require('formulario/verEmpleado.php'); //formulario que muestra el usuario 
            formulario($fila,'EMPLEADO BUSCADO'); //SE ENTRA LA FILA QUE DESEAMOS VER Y SU TITULO
        }
        else // si no vuelve a pedir los datos
        {
            //FORMULARIO DE BUSQUEDA
            require('formulario/buscarEmpleado.php');
            formulario('dni');
            if (isset($_POST["acepta"]) AND !($conexion->buscarDni($_POST['dni']))->fetch_assoc())  // si se ha pulsado ya el acepta pero al sacar la fila no es true, te da un error           {
            { 
                if ($conexion->numeroError() == 0) 
                {
                    echo 
                    '<div id="aviso">
                        <p>
                            NO SE ENCUENTRA NINGUN EMPLEADO CON ESE DNI
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
        $conexion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
    }
    buscar();
?>