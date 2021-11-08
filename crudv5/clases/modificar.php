<?php
    function modificar()
    {
        require('crud.php'); //busca  el archivo necesario

        $informacion = new Crud(); //crea el objeto con la informacion de la base de datos
        $listaValores = $informacion->buscarId($_GET['id']); //saca el empleado deseado

        if ($fila = $listaValores->fetch_assoc())//llamamos a la fila y confirmamos si existe o no
        {
            if (isset($_POST["acepta"]) AND $informacion->modificarId($_POST) == true) //si se pulsa el input de acepta y se puede hacer modificar, se modificaran los datos y se mostrara el usuario ahora modificado
            {
                $listaValores = $informacion->buscarId($_GET['id']); //la busco de nuevo
                $fila = $listaValores->fetch_assoc(); //saco la fila actualizada
                require('formulario/verEmpleado.php'); //formulario que muestra el usuario nuevo
                formulario($fila,'EMPLEADO ACTUALIZADO'); //SE ENTRA LA FILA QUE DESEAMOS VER
            }
            else //si no existe el input acepta el usuario podra modificar el formulario con los datos
            {
                require('formulario/modificarEmpleado.php'); //formulario que muestra el usuario nuevo

                if (isset($_POST["acepta"]) AND $informacion->modificarId($_POST) == false)  // si se ha pulsado ya el acepta pero el modificar es false, es por un error de los datos de formualrio repetidos
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
        }
        else // si no existe ese usuario te mostrara un aviso
        {
            echo 
            '<div id="aviso">
                <p>
                    ESTE USUARIO NO EXISTE EN NUESTRA BASE DE DATOS
                </p>
                <a href="index.php"><input type="button" name="inicio" value="INICIO"/></a>
            </div>';
        }

        $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
    }
    
    modificar(); // llamamos a la funcion 
?>