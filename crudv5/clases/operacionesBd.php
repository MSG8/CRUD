<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud: buscamos, eleminamos, modificamos, añadimos y vemos una lista
   */
  class Crud
  {
    public $conexion;
    private $resultado;
    private $tabla; // cambiar la tabla en la que se realiza las consultas

    function __construct($tabla='EMPLEADO')
    {
      require 'config.php'; //llamamos a los parametros para la conexion
      $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDATOS);
      $this->tabla = $tabla;
    }

    public function hacerConsulta($consulta) //metodo usado por si se modifica el objeto que trabaja con bases de datos
    {
      return $this->conexion->query($consulta);
    }

    public function lista() //Saca toda la informacion de una tabla especifica
    {
      $consulta = "SELECT * FROM ".$tabla.";"; //Colocamos la instruccion para traer los datos de nombre, correo y id(solo funcional) de todos los empleados
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
      return $this->resultado;
    }

    public function buscar($valor,$nombre) //Busca la fila/s buscando por una columna en especifico y el valor de esta
    {
      $consulta = "SELECT * FROM ".$tabla." WHERE ".$nombre." = '".$valor."';"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
      return $this->resultado;
    }

    public function eleminar($valor,$nombre) //Borra la fila/s buscando por una columna en especifico y el valor de esta
    {
      $consulta = "DELETE FROM ".$tabla." WHERE ".$nombre." = '".$valor."';"; // Colocamos la consulta para eliminar el empleado pedido
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
      return $this->resultado;
    }

    public function modificar($formulario,$valor,$nombre) //Modificiamos el empleado pedido
    {
      $consulta = "UPDATE ".$tabla." SET IdEmpleado='".$formulario['id']."',DNI='".$formulario['dni']."',Nombre='".$formulario['nombre']."',Correo=".$this->vaciar($formulario['correo']).", Telefono='".$formulario['telefono']."'  WHERE ".$nombre." = '".$valor."';"; // Colocamos la consulta para actualizar los datos de dicho empleado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
      return $this->resultado;
    }

    public function anadir($formulario) //Añadimos un nuevo empleado
    {
      $consulta = "INSERT INTO ".$tabla." VALUES ('".$formulario['id']."','".$formulario['dni']."','".$formulario['nombre']."',".$this->vaciar($formulario['correo']).", '".$formulario['telefono']."');"; // Colocamos la consulta para agregar
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
      return $this->resultado;
    }

    public function vaciar($valor) //Metodo para colocar si algun cambio esta vacio, como null
    {
      if (empty($valor)) 
      {
        return 'null'; // envio una concatenacion poruqe si no no lo entiende php
      }
      else
      {
        return "'".$valor."'";//si el valor es diferente a vacio pues introduce el valor que metimos por formulario
      }
    }
    
    public function informacionError() //La llamamos para ver una descripcion del error de la consulta
    {
      return $this->conexion->error;
    }

    public function numeroError() //La llamamos para ver el numero de error correspondiente por la consulta
    {
      return $this->conexion->errno;
    }

    public function filasResultado() //La llamamos para ver el numero de filas del resultado
    {
      return $this->resultado->num_rows;
    }

    public function cerrar() //La llamamos para cerrar la conexion con la  base de datos
    {
      $this->conexion->close();
    }
  }

?>
