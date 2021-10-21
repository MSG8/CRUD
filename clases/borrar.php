<?php
    require('crud.php');

    $informacion = new Crud();

    $listaValores = $informacion->buscarId($_GET['id']);

    if ($fila = $listaValores->fetch_row())//llamamos a cada fila del array de toda la base de datos
    {
    echo //creara una seccion de la informacion de cada empleado, ademas de guardar cual es su id en los botones
        '<section>
            <form action="?id='.$fila[0].'" method="post" >
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
                <button type="submit" value="si" name="acepta"> SI </button>
                <a href="index.php"><button type="button" value="no"> NO </button></a>
            </form>
        </section>';
    }
    else
    {
        echo //creara una seccion de la informacion de cada empleado, ademas de guardar cual es su id en los botones
        '<section>
            <p>
                ESTE USUARIO NO EXISTE EN NUESTRA BASE DE DATOS
            </p>
            <a href="index.php"><button type="button" value="inicio"> LISTADO </button></a>
        </section>';
    }

    if (isset($_POST["acepta"])) 
    {
        $informacion->eleminarId($_GET['id']);
    }
    $informacion->cerrar();
?>