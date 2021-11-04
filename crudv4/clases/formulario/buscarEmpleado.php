<?php
    function formulario($tipoBusqueda)
    {
        echo 
            '<section>
                <form action="" method="post" >
                    <h2> BUSQUEDA DE EMPLEADO </h2>';
                    switch ($tipoBusqueda) 
                    {
                        case 'dni':
                            echo
                                '<div>
                                    <label for="dni">  BUSCAR DNI </label>
                                    <input type="text" name="dni" value="" maxlength="9" pattern="[0-9]{8}[A-Z]{1}" required="required" />
                                </div>';
                            break;
                        case 'nombre':
                            echo
                                '<div>
                                    <label for="nombre"> Nombre </label>
                                    <input type="text" name="nombre" value="" maxlength="50" required="required" />
                                </div>';
                            break;
                        default:
                            echo 'busqueda no contemplado';
                            break;
                    }
                    echo
                    '<input type="submit" value="BUSCAR" name="acepta" />
                </form>
            </section>';
    }
?>