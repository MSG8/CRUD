<?php
    require('crud.php');

    $informacion = new Crud();
    if (isset($_POST["acepta"])) 
    {
        $informacion->anadir($_POST); // añade al empleado
        $listaValores = $informacion->buscarId($_POST['id']); //lo busca
        $fila = $listaValores->fetch_row(); //saco la fila actualizada
        echo //muestra que se a añadido ese empleado
            '<section>
                <form action=" " method="post" >
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
    else
    {
        echo //creara una seccion de la informacion de cada empleado, ademas de guardar cual es su id en los botones
            '<section>
                <form action="#" method="post" >
                    <h2>¿SEGURO APLICAR ESTA MODIFICACIÓN?</h2>
                    <div>
                        <label for="id"> Identificador </label>
                        <input type="number" name="id" value=" " />
                    </div>
                    <div>
                        <label for="dni"> DNI </label>
                        <input type="text" name="dni" value=" " maxlength="9"/>
                    </div>
                    <div>
                        <label for="nombre"> Nombre </label>
                        <input type="text" name="nombre" value=" " maxlength="50"/>
                    </div>
                    <div>
                        <label for="correo"> Correo </label>
                        <input type="email" name="correo" value=" " maxlength="50"/>
                    </div>
                    <div>
                        <label for="telefono"> Telefono</label>
                        <input type="text" name="telefono" value=" " maxlength="9"/>
                    </div>
                    <input type="submit" value="MODIFICAR" name="acepta" />
                    <a href="index.php"><input type="button" value="CANCELAR"/></a>
                </form>
            </section>';
    }

    $informacion->cerrar(); //CIERRA LA CONEXION CON LA BASE DE DATOS
?>