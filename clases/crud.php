<?php
  /**
   * Esta clase se usara para emplear los metodos necesarios en un crud
   */
  class Crud
  {
    private $servidor;
    private $usuario;
    private $contrasenia;
    private $basedatos;

    public $mysqli;

    function __construct()
    {
      $mysqli = new mysqli($servidor, $usuario, $contrasenia, $basedatos);
    }
  }

?>
