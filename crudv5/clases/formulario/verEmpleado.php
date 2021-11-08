<?php
    function formulario($fila,$titulo)
    {
        echo 
            '<section>
                <form action=" " method="post">
                    <h2> '.$titulo.' </h2>
                    <div>
                        <label for="id"> Identificador </label>
                        <input type="number" name="id" value="'.$fila['IdEmpleado'].'" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="dni"> DNI </label>
                        <input type="text" name="dni" value="'.$fila['DNI'].'" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="nombre"> Nombre </label>
                        <input type="text" name="nombre" value="'.$fila['Nombre'].'" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="correo"> Correo </label>
                        <input type="email" name="correo" value="'.$fila['Correo'].'"readonly="readonly" placeholder="CORREO VACIO"/>
                    </div>
                    <div>
                        <label for="telefono"> Telefono</label>
                        <input type="text" name="telefono" value="'.$fila['Telefono'].'" readonly="readonly"/>
                    </div>';
                    if ($_GET["op"] == "buscarNombre" || $_GET["op"] == "buscarDni") 
                    {
                        echo
                        '<a href="clases/direc.php?id='.$fila['IdEmpleado'].'&op=borrar""><input type="button" value="BORRAR"/></a>
                        <a href="clases/direc.php?id='.$fila['IdEmpleado'].'&op=modificar"><input type="button" value="MODIFICAR"/></a>';
                    }
                    echo
                    '<a href="index.php"><input type="button" value="LISTADO"/></a>
                </form>
            </section>';
    }
?>