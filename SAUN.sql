drop database SAUN;
create database SAUN;
use SAUN;

create table roles
(
id smallint not null primary key,
rol varchar(50) not null
);

insert into roles value (1,'Medico');
insert into roles value (2,'Paramedico');
insert into roles value (3,'Usuario');

Create table Usuario
(
curp varchar(20) not null primary key,
Nombre_us varchar(30) not null,
Apellido_us varchar(30) not null, 
Fecha_nac date not null,
Estado_us varchar(30) not null, 
Num_telefono_us varchar(10) not null,
password_us varchar(16) not null, 
rol_id smallint not null,
key roles (rol_id)
);
-- INSERT INTO usuario (CURP, Nombre_us, Apellido_us, Fecha_nac,  Estado_us, Num_telefono_us, Password_us, rol_id ) VALUES ('','','','','','','','');
select * from usuario;


Create table Medico
(
Cedula varchar(10) not null primary key,
Nombre_med varchar(50) not null, 
Apellido_med varchar(50) not null,
Sexo_med varchar(10) not null,
Fecha_nac_med date not null,
Institucion_med varchar(50) not null,
Estado_med varchar(25) not null,
Num_telefono_med varchar(10) not null,
Password_med varchar(16) not null,
rol_id smallint not null,
key roles (rol_id)
);
select * from medico;


-- Pendiente
Create table Paramedico
(
Cedula_par varchar(10) not null primary key,
Nombre_par varchar(50) not null, 
Num_telefono_par varchar(10) not null,
Password_par varchar(16) not null,
rol_id smallint not null,
key roles (rol_id)
);
select * from paramedico;

Create table Informacion_Usuario
(
Id smallint auto_increment not null primary key,
Sexo  varchar(10) not null,
Tipo_Sangre varchar(10) not null,
Alergia varchar(100) not null,
Cirugias varchar(100) not null,
Farmaco varchar(100) not null, 
Num_telefono_emer varchar(10) not null,
Us_CURP varchar(20) not null, 
key Usuario (Us_CURP)
);
-- INSERT INTO Informacion_Usuario (Sexo, Tipo_Sangre, Alergia, Cirugias, Farmaco, Num_telefono_emer, Us_CURP) VALUES ('','','','','','','');

-- Pendiente
Create table Historia_Clinico
(
Id smallint auto_increment not null primary key,
Enfermedad varchar(100) not null,
Lesiones char(2) not null,
Infeccion char(2) not null,
Fiebre varchar(10) not null, 
Us_CURP_hc varchar(20) not null,
Med_Cedula varchar(10) not null,
key Usuario (Us_CURP_hc),
Key Medico (Med_Cedula)
);

-- INSERT INTO usuario (CURP, Nombre_us, Num_telefono_us, Password_us, rol_id ) VALUES ('HDJK45S87DA541525','Jorge','1111555423','12345','3');

-- INSERT INTO Medico (Cedula, Nombre_med, Num_telefono_med, Password_med, rol_id) VALUES ('DA4152656','Javier','888768564','12345','1');

-- INSERT INTO Paramedico (Cedula_par, Nombre_par, Num_telefono_par, Password_par, rol_id) VALUES ('54j52u6','Carlos','7854123695','12345','2');

-- INSERT INTO Informacion_Usuario (Id, Domicilio, Edad, Tipo_Sangre, Altura, Peso, Enfermedades, Medicamentos, Alergias, Antecedentes, Us_CURP) VALUES (01,'Calle','20','A+','180','86','Sanito','Clona','A la vida','Muerto en Vida','HDJK45S87DA541525');

-- INSERT INTO Historia_Clinico (Id, Enfermedad, Lesiones, Infeccion, Fiebre, Us_CURP_hc, Med_Cedula) VALUES (01, 'COVID','No','Si','38.4','DJK45S87DA541525','DA4152656');


