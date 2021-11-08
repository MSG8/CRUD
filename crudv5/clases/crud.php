<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud
   */
  class Crud
  {
    private $conexion;
    private $resultado;

    function __construct()
    {
      require 'config.php'; //llamamos a los parametros para la conexion
      $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDATOS);
    }

    public function hacerConsulta($consulta) //metodo usado por si se modifica el objeto que trabaja con bases de datos
    {
      return $this->conexion->query($consulta);
    }

    public function lista() //Traemos todas las filas de la tabla empleado
    {
      $consulta = "SELECT IdEmpleado as id, Nombre as nombre, DNI as dni FROM EMPLEADO;"; //Colocamos la instruccion para traer los datos de nombre, correo y id(solo funcional) de todos los empleados
      $this->resultado=$this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con las filas pedidas
      return $this->resultado;
    }

    public function buscarId($id) //Traemos el empleado buscando por su id
    {
      $consulta = "SELECT * FROM EMPLEADO WHERE IdEmpleado = '".$id."';"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
      return $this->resultado;
    }

    public function buscarDni($dni) //Traemos el empleado buscando por su dni
    {
      $consulta = "SELECT * FROM EMPLEADO WHERE DNI = '".$dni."';"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
      return $this->resultado;
    }

    public function buscarNombre($nombre) //Traemos el empleado buscando por su dni
    {
      $consulta = "SELECT IdEmpleado as id, Nombre as nombre, DNI as dni FROM EMPLEADO WHERE REPLACE(Nombre,' ', '') LIKE REPLACE('%".$nombre."%',' ', '');"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
      return $this->resultado;
    }

    public function eleminarId($id) //Borra el empleado por su id
    {
      $consulta = "DELETE FROM EMPLEADO WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para eliminar el empleado pedido
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
      return $this->resultado;
    }

    public function modificarId($formulario) //Modificiamos el empleado pedido por su id
    {
      $consulta = "UPDATE EMPLEADO SET DNI='".$formulario['dni']."', Nombre='".$formulario['nombre']."',Correo=".$this->vaciar($formulario['correo']).", Telefono='".$formulario['telefono']."'  WHERE IdEmpleado = '".$formulario['id']."'"; // Colocamos la consulta para actualizar los datos de dicho empleado
      $this->resultado= $this->hacerConsulta($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
      return $this->resultado;
    }

    public function anadir($formulario) //Añadimos un nuevo empleado
    {
      $consulta = "INSERT INTO EMPLEADO (DNI,Nombre,Correo,Telefono) VALUES ('".$formulario['dni']."','".$formulario['nombre']."',".$this->vaciar($formulario['correo']).", '".$formulario['telefono']."');"; // Colocamos la consulta para agregar
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
