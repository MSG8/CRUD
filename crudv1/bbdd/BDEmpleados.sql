-- DROP DATABASE BDEMPLEADO;
-- CREATE DATABASE BDEMPLEADO;
-- USE 'user2daw_BD2-13';
USE 'BDEMPLEADO';

-- Creamos la tabla empleado
CREATE TABLE EMPLEADO
(
	IdEmpleado tinyint UNSIGNED NOT NULL PRIMARY KEY,
	DNI char(9) NOT NULL UNIQUE,
  	Nombre varchar(50) NOT NULL,
	Correo varchar(50) NULL,
	Telefono char(9) NOT NULL UNIQUE
);

-- Insertamos unos datos de prueba
INSERT INTO EMPLEADO 
VALUES  
	(11,'81808080D','Manuel Gomez Rodriguez','mgr11@gmail.com','688688688'),
	(12,'82808080D','Juan Saul Rodriguez','jsr12@gmail.com','699688688'),
	(13,'83808080D','Manuel Gomez Saul','mgs13@gmail.com','698688688'),
	(14,'84808080D','Esperanza Gomez Rodriguez','egr14@gmail.com','688698688'),
	(15,'85808080D','Manuel Gomez Rodriguez','mgr15@gmail.com','688688689');

-- Traemos una lista de empleados completa
SELECT * 
FROM EMPLEADO;

-- Traemos una lista de empleada reducida
SELECT IdEmpleado as id, Nombre as nombre, DNI as dni 
FROM EMPLEADO;

-- Buscamos por un id en especifico
SELECT * 
FROM EMPLEADO
WHERE IdEmpleado = 10;

-- Borrar por un id
DELETE FROM EMPLEADO
WHERE IdEmpleado = 10;

-- Modificar por un id
UPDATE EMPLEADO
SET IdEmpleado='id',DNI='dni',Nombre='nombre',Correo='correo', Telefono='telefono'
WHERE IdEmpleado = 11; 

-- Agregar solo una persona

INSERT INTO EMPLEADO 
VALUES  
	(20,'81858080D','Juan Somez Rodriguez','mgrf11@gmail.com','688688098');