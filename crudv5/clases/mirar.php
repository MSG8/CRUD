<?php
    function ver()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        $listaValores = $informacion->buscarId($_GET['id']); //llamamos al metodo que devuelve la fila pedida

        if ($fila = $listaValores->fetch_assoc())//vemos si existe la fila o no
        {
            require('formulario/verEmpleado.php'); //formulario que muestra el usuario nuevo
            formulario($fila,'DATOS DE EMPLEADO'); //SE ENTRA LA FILA QUE DESEAMOS VER
        }
        else //si no existe la fila mostrara un aviso
        {
            echo 
                '<div id="aviso">
                    <p>
                        ESTE USUARIO NO EXISTE EN NUESTRA BASE DE DATOS
                    </p>
                    <a href="index.php"><input type="button" name="inicio" value="Inicio"/></a>
                </div>';
        }
        $informacion->cerrar(); //CERRAMOS LA CONEXION CON LA BASE DE DATOS
    }
    ver();
?>