

use ECONET


create table registro
(idregistro int IDENTITY(1,1) PRIMARY KEY,
nombre varchar(50)not null,
apellido varchar(50)not null,
sexo varchar(20),
provincia varchar(50),
correo_electronico varchar(80),
contrasena varchar(10) not null,
confirmacion_contrasena varchar(10) not null,
nombre_de_usuario varchar(80) not null 
)
