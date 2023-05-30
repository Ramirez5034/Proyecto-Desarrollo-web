create database KFC;
use KFC;
CREATE TABLE Area
(
idArea INT NOT NULL auto_increment,
nombre CHAR(10) NOT NULL,
empleadoRequerido INT NOT NULL,
horasRequeridas INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idArea)
);

CREATE TABLE Almacen
(
idAlmacen INT NOT NULL auto_increment,
nombre VARCHAR(50) NOT NULL,
encargado VARCHAR(50) NOT NULL,
capacidad INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idAlmacen)
);

CREATE TABLE Empleado
(
idEmpleado INT NOT NULL auto_increment,
nombre CHAR(10) NOT NULL,
APaterno CHAR(10) NOT NULL,
AMaterno CHAR(10) NOT NULL,
salario INT NOT NULL,
telefono VARCHAR(10) NOT NULL,
FechaContratacion DATE DEFAULT CURRENT TIMESTAMP,
idSucursal INT NOT NULL,
idArea INT NOT NULL,
idUsuario INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idEmpleado)
);

CREATE TABLE Sucursal
(
idSucursal INT NOT NULL auto_increment,
nombre VARCHAR(50) NOT NULL,
estado VARCHAR(50) NOT NULL,
telefono VARCHAR(10) NOT NULL,
idAlmacen INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idSucursal)
);

CREATE TABLE Producto
(
idProducto INT NOT NULL auto_increment,
nombre VARCHAR(50) NOT NULL,
cantidad VARCHAR(50) NOT NULL,
marca VARCHAR(50) NOT NULL,
FechaIngreso DATE DEFAULT CURRENT TIMESTAMP,
idAlmacen INT NOT NULL,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idProducto)
);

CREATE TABLE Usuario
(
idUsuario INT NOT NULL auto_increment,
nombre VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
clave VARCHAR(50) NOT NULL,
FechaCreacion DATE DEFAULT CURRENT TIMESTAMP,
estatus BIT DEFAULT 1 NOT NULL,
primary key (idUsuario)
);


CREATE INDEX IX_Area ON Area(idArea);
CREATE INDEX IX_Almacen ON Almacen(idAlmacen);
CREATE INDEX IX_Empleado ON Empleado(idEmpleado);
CREATE INDEX IX_Sucursal ON Sucursal(idSucursal);
CREATE INDEX IX_Producto ON Producto(idProducto);
CREATE INDEX IX_Usuario ON Usuario(idUsuario);


ALTER TABLE Empleado ADD CONSTRAINT FK_EmpleadoArea
FOREIGN  KEY(idArea) REFERENCES Area(idArea);

ALTER TABLE Empleado ADD CONSTRAINT FK_EmpleadoUsuario
FOREIGN  KEY(idUsuario) REFERENCES Area(idUsuario);

ALTER TABLE Empleado ADD CONSTRAINT FK_EmpleadoSucursal
FOREIGN  KEY(idSucursal) REFERENCES Sucursal(idSucursal);

ALTER TABLE Sucursal ADD CONSTRAINT FK_SucursalAlmacen
FOREIGN  KEY(idAlmacen) REFERENCES Almacen(idAlmacen);

ALTER TABLE Producto ADD CONSTRAINT FK_ProductoAlmacen
FOREIGN  KEY(idAlmacen) REFERENCES Almacen(idAlmacen);

CREATE VIEW vista_empleado AS
SELECT
  e.idEmpleado,
  e.nombre,
  e.APaterno,
  e.AMaterno,
  e.salario,
  e.telefono,
  e.FechaContratacion,
  s.nombre AS nombreSucursal,
  a.nombre AS nombreArea,
  u.nombre AS nombreUsuario
FROM Empleado e
INNER JOIN Sucursal s ON e.idSucursal = s.idSucursal
INNER JOIN Area a ON e.idArea = a.idArea
INNER JOIN Usuario u ON e.idUsuario = u.idUsuario
WHERE e.estatus = 1;

CREATE VIEW vista_producto AS
SELECT
  p.idProducto,
  p.nombre,
  p.cantidad,
  p.marca,
  p.FechaIngreso,
  a.nombre AS nombreAlmacen
FROM Producto p
INNER JOIN Almacen a ON p.idAlmacen = a.idAlmacen
WHERE p.estatus = 1;

CREATE VIEW vista_usuario AS SELECT * FROM Usuario WHERE estatus = 1