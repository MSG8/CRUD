<?php
    function ver()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        $listaValores = $informacion->buscarId($_GET['id']); //llamamos al metodo que devuelve la fila pedida

        if ($fila = $listaValores->fetch_row())//vemos si existe la fila o no
        {
            echo 
                '<section>
                    <form>
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
                        <a href="index.php"><input type="button" value="LISTADO"/></a>
                    </form>
                </section>';
        }
        else //si no existe la fila mostrara un aviso
        {
            echo 
                '<section>
                    <p>
                        ESTE USUARIO NO EXISTE EN NUESTRA BASE DE DATOS
                    </p>
                    <a href="index.php"><input type="button" name="inicio" value="Inicio"/></a>
                </section>';
        }
        $informacion->cerrar(); //CERRAMOS LA CONEXION CON LA BASE DE DATOS
    }

    ver();
?>