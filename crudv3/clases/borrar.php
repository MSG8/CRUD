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

            if ($fila = $listaValores->fetch_row())//llamamos su fila, si existe mostrara los datos por el formulario
            {
                echo 
                    '<section>
                        <form action="?id='.$_GET['id'].'&op=borrar" method="post">
                            <h2>¿SEGURO DE BORRAR ESTE USUARIO?</h2>
                            <div>
                                <label for="id"> Identificador </label>
                                <input type="number" name="id" value="'.$fila[0].'" readonly="readonly"/>
                            </div>
                            <div>
                                <label for="dni"> DNI </label>
                                <input type="text" name="dni" value="'.$fila[1].'" readonly="readonly"/>
                            </div>
                            <div>
                                <label for="nombre"> Nombre </label>
                                <input type="text" name="nombre" value="'.$fila[2].'" readonly="readonly"/>
                            </div>
                            <div>
                                <label for="correo"> Correo </label>
                                <input type="email" name="correo" value="'.$fila[3].'"readonly="readonly"/>
                            </div>
                            <div>
                                <label for="telefono"> Telefono</label>
                                <input type="text" name="telefono" value="'.$fila[4].'" readonly="readonly"/>
                            </div>
                            
                            <input type="submit" value="BORRAR" name="acepta" />
                            <a href="index.php"><input type="button" value="CANCELAR"/></a>
                        </form>
                    </section>';
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