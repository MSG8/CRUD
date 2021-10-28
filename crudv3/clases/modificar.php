<?php
    function modificar()
    {
        require('crud.php'); //busca  el archivo necesario

        $informacion = new Crud(); //crea el objeto con la informacion de la base de datos
        $listaValores = $informacion->buscarId($_GET['id']); //saca el empleado deseado

        if ($fila = $listaValores->fetch_row())//llamamos a la fila y confirmamos si existe o no
        {
            if (isset($_POST["acepta"]) AND $informacion->modificarId($_POST) == true) //si se pulsa el input de acepta y se puede hacer modificar, se modificaran los datos y se mostrara el usuario ahora modificado
            {
                $listaValores = $informacion->buscarId($_GET['id']); //la busco de nuevo
                $fila = $listaValores->fetch_row(); //saco la fila actualizada
                echo 
                    '<section>
                        <form action="?id='.$fila[0].'&op=modificar" method="post" >
                            <h2> EMPLEADO ACTUALIZADO </h2>
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
            else //si no existe el input acepta el usuario podra modificar el formulario con los datos
            {
                echo 
                    '<section>
                        <form action="?id='.$fila[0].'&op=modificar" method="post" >
                            <h2> MODIFICACION DEL EMPLEADO </h2>
                            <div>
                                <label for="id"> Identificador </label>
                                <input type="number" name="id" value="'.$fila[0].'" readonly="readonly"/>
                            </div>
                            <div>
                                <label for="dni"> DNI </label>
                                <input type="text" name="dni" value="'.$fila[1].'" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" required="required" />
                            </div>
                            <div>
                                <label for="nombre"> Nombre </label>
                                <input type="text" name="nombre" value="'.$fila[2].'" maxlength="50" required="required" />
                            </div>
                            <div>
                                <label for="correo"> Correo </label>
                                <input type="email" name="correo" value="'.$fila[3].'" maxlength="50"/>
                            </div>
                            <div>
                                <label for="telefono"> Telefono</label>
                                <input type="text" name="telefono" value="'.$fila[4].'" maxlength="9" pattern="[0-9]{9}" required="required"/>
                            </div>
                            <input type="submit" value="MODIFICAR" name="acepta" />
                            <a href="index.php"><input type="button" value="CANCELAR"/></a>
                        </form>
                    </section>';

                if (isset($_POST["acepta"]) AND $informacion->modificarId($_POST) == false)  // si se ha pulsado ya el acepta pero el modificar es false, es por un error de los datos de formualrio repetidos
                {
                    echo $informacion->numeroError();
                    echo $informacion->informacionError();
                    if ($informacion->numeroError() == 1062) 
                    {
                        echo 
                        '<div id="aviso">
                            <p>
                                HAS USADO UN DNI REPETIDO
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