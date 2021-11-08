<?php
    function lista($fila);
    {
        echo 
        '<section>
            <p> '.$fila['nombre'].' </p>
            <p> '.$fila['dni'].' </p>
            <div><a href="clases/direc.php?id='.$fila['id'].'&op=borrar"><img src="imagenes/papelera.png" alt="borrar empleado"/></a></div>
            <div><a href="clases/direc.php?id='.$fila['id'].'&op=modificar"><img src="imagenes/papel.png" alt="modificar empleado"/></a></div>
            <div><a href="clases/direc.php?id='.$fila['id'].'&op=mirar"><img src="imagenes/lupa.png" alt="ver empleado"/></a></div>
        </section>';
    }
    lista($fila);
?>