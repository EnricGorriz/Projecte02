SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `bd_reservas` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_reservas`;


/*Estructura de tabla para la tabla `tbl_recursos`*/
CREATE TABLE IF NOT EXISTS `tbl_recursos` (
	`rec_id` int(11) NOT NULL,
	`rec_contingut` varchar(255) NOT NULL,
	`rec_reservado` boolean NOT NULL default true,
	`rec_tipo_rec` boolean NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/	;
			ALTER TABLE `tbl_recursos`
			ADD CONSTRAINT PRIMARY KEY (rec_id);
/* Modificació a autoincremental */;
			ALTER TABLE `tbl_recursos`
			MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;	
/* INSERTAR DADES A LA TAULA RECURSOS */
INSERT INTO `tbl_recursos`(`rec_id`, `rec_contingut`, `rec_tipo_rec`)VALUES
(1,'aula de teoria 1',1),
(2,'aula de teoria 2',1),
(3,'aula de teoria 3',1),
(4,'aula de teoria 4',1),
(5,'aula informàtica 1',1),
(6,'aula informàtica 2',1),
(7,'despatx per a entrevistes 1',1),
(8,'despatx per a entrevistes 2',1),
(9,'sala de reunions',1),
(10,'projector portàtil',0),
(11,'carro de portàtils',0),
(12,'portàtil 1',0),
(13,'portàtil 2',0),
(14,'portàtil 3',0),
(15,'mòbil 1',0),
(16,'mòbil 2',0);

			
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
	`usu_email` varchar(50) NOT NULL,
	`usu_contra` varchar(14) NOT NULL,
	`usu_nom` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/	;
			ALTER TABLE `tbl_usuario`
			ADD CONSTRAINT PRIMARY KEY (usu_email);
/* INSERTAR DADES A LA TAULA USUARIO */
INSERT INTO `tbl_usuario`(`usu_email`, `usu_contra`, `usu_nom`)VALUES
('jorge.empresamolona@msn.com','1234qwer','Jorge'),
('oriol.empresamolona@msn.com','qwer1234','Oriol'),
('enric.empresamolona@msn.com','12qw34er','Enric'),
('aitor.empresamolona@msn.com','1q2w3e4r','Aitor'),
('david.empresamolona@msn.com','r4e3w2q1','David'),
('xavi.empresamolona@msn.com','13qe24wr','Xavi'),
('alejandro.empresamolona@msn.com','r3w1e2q4','Alejandro'),
('victor.empresamolona@msn.com','1r2e3w4q','Victor'),
('agnes.empresamolona@msn.com','q1w2e3r4','Agnes'),
('it.empresamolona@msn.com','¡','IT');

			
CREATE TABLE IF NOT EXISTS `tbl_reservas` (
	`res_id` int(11) NOT NULL,
	`res_fecha_ini` date NOT NULL,
	`res_hora_ini` date NOT NULL,
	`res_fecha_fin` date NOT NULL,
	`res_hora_fin` date NOT NULL,
	`res_incidencia` boolean NOT NULL default true,
	`res_incidencia_coment` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*ASSIGNACIÓ DE CLAU PRIMARIA*/	;
			ALTER TABLE `tbl_reservas`
			ADD CONSTRAINT PRIMARY KEY (res_id);
/* Modificació a autoincremental */;
			ALTER TABLE `tbl_reservas`
			MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;	
/* Modificació de la taula Jugador*/;
			ALTER TABLE `tbl_reservas`
			ADD UsuarioReservante varchar(50) NULL;	
			ALTER TABLE `tbl_reservas`
			ADD idRecurso int(11) NULL;	


	
	/* RELACIONS*/
/* FK tbl_reservas PK tbl_usuario */;
ALTER TABLE `tbl_reservas`
ADD CONSTRAINT FOREIGN KEY (UsuarioReservante)
REFERENCES `tbl_usuario` (usu_email);
/* FK tbl_reservas PK tbl_recursos */;
ALTER TABLE `tbl_reservas`
ADD CONSTRAINT FOREIGN KEY (idRecurso)
REFERENCES `tbl_recursos` (rec_id);