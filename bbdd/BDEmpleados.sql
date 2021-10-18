-- USE 'nombre_BD';
USE 'BDEMPLEADO';

CREATE TABLE EMPLEADO
(
	IdEmpleado tinyint UNSIGNED NOT NULL PRIMARY KEY,
	DNI char(9) NOT NULL UNIQUE,
  Nombre varchar(50) NOT NULL,
	Correo varchar(50) NULL UNIQUE,
	Telefono char(9) NOT NULL UNIQUE
);