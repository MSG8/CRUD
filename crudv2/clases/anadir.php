<?php
    function anadir()
    {
        require('crud.php'); //buscamos el archivo necesario
        $informacion = new Crud(); // creamos el objeto con los datos d ela base de datos
        if (isset($_POST["acepta"]) AND $informacion->anadir($_POST)== true)  // si se a pulsado el input de acepta y el añadir es verdadero, se hace
        {
            $listaValores = $informacion->buscarId($_POST['id']); //lo busca
            $fila = $listaValores->fetch_row(); //saco la fila actualizada, asi informa de que ya hay nuevo empleado
            echo 
                '<section>
                    <form action=" " method="post">
                        <h2> EMPLEADO NUEVO </h2>
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
        else // si no vuelve a pedir los datos
        {
            echo 
                '<section>
                    <form action="#" method="post" >
                        <h2> AÑADIR NUEVO EMPLEADO </h2>
                        <div>
                            <label for="dni"> DNI </label>
                            <input type="text" name="dni" value="" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" required="required"/>
                        </div>
                        <div>
                            <label for="nombre"> Nombre </label>
                            <input type="text" name="nombre" value="" maxlength="50" required="required"/>
                        </div>
                        <div>
                            <label for="correo"> Correo </label>
                            <input type="email" name="correo" value="" maxlength="50"/>
                        </div>
                        <div>
                            <label for="telefono"> Telefono</label>
                            <input type="text" name="telefono" value="" maxlength="9" pattern="[0-9]{9}" required="required" />
                        </div>
                        <input type="submit" value="AÑADIR" name="acepta" />
                        <a href="index.php"><input type="button" value="CANCELAR"/></a>
                    </form>
                </section>';
            if (isset($_POST["acepta"]) AND $informacion->anadir($_POST) == false)  // si se ha pulsado ya el acepta pero el añadir es false, es por un error de los datos de formualrio repetidos
            {
                echo 
                    '<div id="aviso">
                        <p>
                            HAS USADO DATOS UNICOS REPETICOS (PUEDE SER LA ID O DNI)
                        </p>
                    </div>';
            }
        }

        $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
    }

    anadir();


?>