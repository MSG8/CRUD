<?php
    function formulario($fila)
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
                        <input type="email" name="correo" value="'.$fila[3].'" maxlength="50" />
                    </div>
                    <div>
                        <label for="telefono"> Telefono</label>
                        <input type="text" name="telefono" value="'.$fila[4].'" maxlength="9" pattern="[0-9]{9}" required="required"/>
                    </div>
                    <input type="submit" value="MODIFICAR" name="acepta" />
                    <a href="index.php"><input type="button" value="CANCELAR"/></a>
                </form>
            </section>';
    }
    formulario($fila);
?>