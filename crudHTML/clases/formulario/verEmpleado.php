<?php
    function formulario(fila,titulo)
    {
        echo 
            '<section>
                <form action=" " method="post">
                    <h2> titulo </h2>
                    <div>
                        <label for="id"> Identificador </label>
                        <input type="number" name="id" value="IdEmpleado" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="dni"> DNI </label>
                        <input type="text" name="dni" value="DNI" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="nombre"> Nombre </label>
                        <input type="text" name="nombre" value="Nombre" readonly="readonly"/>
                    </div>
                    <div>
                        <label for="correo"> Correo </label>
                        <input type="email" name="correo" value="Correo"readonly="readonly" placeholder="CORREO VACIO"/>
                    </div>
                    <div>
                        <label for="telefono"> Telefono</label>
                        <input type="text" name="telefono" value="Telefono" readonly="readonly"/>
                    </div>'
                    '<a href="index.php"><input type="button" value="LISTADO"/></a>
                </form>
            </section>';
    }
?>