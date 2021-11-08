<?php
    function borrar()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos

        if (isset($_POST["acepta"])) // si se a pulsado en input acepta se elimara el usuario
        {
            $informacion->eleminarId($_GET['id']); //llama al metodo para borrar un empleado especifico 
            echo 
            '<div id="aviso">
                <p>
                    EMPLEADO BORRADO
                </p>
                <a href="index.php"><input type="button" name="inicio" value="INICIO"/></a>
            </div>';
        }
        else 
        {
            $listaValores = $informacion->buscarId($_GET['id']); // llamamos al metodo de buscar por id, asi podremos enseñar al usuario el empleado que va a borrar
            if ($fila = $listaValores->fetch_assoc())//llamamos su fila, si existe mostrara los datos por el formulario
            {
                require('formulario/borrarEmpleado.php'); // formulario a rellenar para crear un empleado
            }
            else //si no existe esa fila, avisa al usuario que no existe
            {
                echo // muestra la informacion si no existe en la base de datos sale esto
                '<div id="aviso">
                    <p>
                        ESTE EMPLEADO NO EXISTE EN NUESTRA BASE DE DATOS
                    </p>
                    <a href="index.php"><input type="button" name="inicio" value="INICIO"/></a>
                </div>';
            }
        }
        $informacion->cerrar(); //CIERRA LA CONEXION DE LA BASE DE DATOS
    }

    borrar(); //llamamos a la funcion
?>