<?php
    function formulario()
    {
        echo 
            '<section>
                <form action="" method="post" >
                    <h2> AÑADIR NUEVO EMPLEADO </h2>
                    <div>
                        <label for="dni"> DNI </label>
                        <input type="text" name="dni" value="" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" placeholder="00000000X" required="required"/>
                    </div>
                    <div>
                        <label for="nombre"> Nombre </label>
                        <input type="text" name="nombre" value="" maxlength="50" required="required"/>
                    </div>
                    <div>
                        <label for="correo"> Correo </label>
                        <input type="email" name="correo" value="" maxlength="50" placeholder="ejemplo@gmail.com"/>
                    </div>
                    <div>
                        <label for="telefono"> Telefono</label>
                        <input type="text" name="telefono" value="" maxlength="9" pattern="[0-9]{9}" placeholder="000000000" required="required" />
                    </div>
                    <input type="submit" value="AÑADIR" name="acepta" />
                    <a href="index.php"><input type="button" value="CANCELAR"/></a>
                </form>
            </section>';
    }
    formulario(); //LLAMA AL FORMULARIO DE AÑADIR
?>