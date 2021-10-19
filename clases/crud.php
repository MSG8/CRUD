<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud
   */
  class Crud
  {
    public $conexion;
    public $resultado;

    function __construct()
    {
      require 'config.php';
      $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDATOS);
    }

    public function lista($array)
    {

    }

    public function agregar($array)
    {
      $consulta ="INSERT INTO EMPLEADO VALUES ("$array[0]",'"$array[1]"', '"$array[2]"', '"$array[3]"', '"$array[4]"');";
      $this->resultado = $this->conexion->query($consulta);
    }

    public function cerrar()
    {
      $this->conexion->close();
    }
  }

?>
