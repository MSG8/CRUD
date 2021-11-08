<?php
    function formulario($fila)
    {
        echo 
            '<section>
                <form action="?id='.$_GET['id'].'&op=borrar" method="post">
                    <h2>¿SEGURO DE BORRAR ESTE USUARIO?</h2>
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
                    </div>
                    <input type="submit" value="BORRAR" name="acepta" />
                    <a href="index.php"><input type="button" value="CANCELAR"/></a>
                </form>
            </section>';
    }
    formulario($fila); //SE ENTRA LA FILA QUE DESEAMOS VER
?>