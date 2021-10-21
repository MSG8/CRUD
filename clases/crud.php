<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud
   */
  class Crud
  {
    public $conexion;

    function __construct()
    {
      require 'config.php';
      $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDATOS);
    }

    public function lista() //Traemos un array de todas las filas de empleados
    {
      $consulta = "SELECT IdEmpleado as id, Nombre as nombre, DNI as dni FROM EMPLEADO;"; //Colocamos la instruccion para traer los datos de nombre, correo y id(solo funcional) de todos los empleados
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function buscarId($id) //Traemos el id del empleado seleccionado
    {
      $consulta = "SELECT * FROM EMPLEADO WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function eleminarId($id) //Borra el id del empleado seleccionado
    {
      $consulta = "DELETE FROM EMPLEADO WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
      $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    public function modificarId($formulario,$id) //Borra el id del empleado seleccionado
    {
      $consulta = "UPDATE EMPLEADO SET IdEmpleado='".$formulario['id']."',DNI='".$formulario['dni']."',Nombre='".$formulario['nombre']."',Correo='".$formulario['correo']."', Telefono='".$formulario['telefono']."'  WHERE IdEmpleado = ".$id.";"; // Colocamos la consulta para traer todos los datos donde sea el id seleccionado
       return $this->conexion->query($consulta); //Enviamos la consulta al metodo query del objeto conexion (mysqli)
    }

    // public function agregar($array)
    // {
    //   $consulta ="INSERT INTO EMPLEADO VALUES ("$array[0]",'"$array[1]"', '"$array[2]"', '"$array[3]"', '"$array[4]"');";
    //   $this->resultado = $this->conexion->query($consulta);
    // }

    public function cerrar() //La llamamos para cerrar la conexion con la  base de datos
    {
      $this->conexion->close();
    }
  }

?>
