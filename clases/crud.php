<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud
   */
  class Crud
  {
    public $conexion;

    function __construct()
    {
      require 'config.php'; //llamamos a los parametros para la conexion
      $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDATOS);
    }

    public function lista() 
    {
      $consulta = "SELECT IdEmpleado as id, Nombre as nombre, DNI as dni FROM EMPLEADO;"; //Colocamos la instruccion para traer los datos de nombre, correo y id(solo funcional) de todos los empleados
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con las filas pedidas
    }

    public function buscarId($id) //Traemos el id del empleado seleccionado
    {
      $consulta = "SELECT * FROM EMPLEADO WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli) y devolvera el array con la fila pedida
    }

    public function eleminarId($id) //Borra el id del empleado seleccionado
    {
      $consulta = "DELETE FROM EMPLEADO WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para eliminar el empleado pedido
      $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function modificarId($formulario,$id) //Modificiamos el empleado pedido
    {
      $consulta = "UPDATE EMPLEADO SET IdEmpleado='".$formulario['id']."',DNI='".$formulario['dni']."',Nombre='".$formulario['nombre']."',Correo=".$this->vaciar($formulario['correo']).", Telefono='".$formulario['telefono']."'  WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para actualizar los datos de dicho empleado
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function anadir($formulario) //Añadimos un nuevo empleado
    {
      $consulta = "INSERT INTO EMPLEADO VALUES ('".$formulario['id']."','".$formulario['dni']."','".$formulario['nombre']."',".$this->vaciar($formulario['correo']).", '".$formulario['telefono']."');"; // Colocamos la consulta para agregar
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function vaciar($valor) //Metodo para colocar si algun cambio esta vacio, como null
    {
      if ($valor == "") 
      {
        return 'nu'.'ll'; // envio una concatenacion poruqe si no no lo entiende php
      }
      else
      {
        return "'".$valor."'";//si el valor es diferente a vacio pues introduce el valor que metimos por formulario
      }
    }

    public function cerrar() //La llamamos para cerrar la conexion con la  base de datos
    {
      $this->conexion->close();
    }
  }

?>
