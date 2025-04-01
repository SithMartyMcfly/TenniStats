drop database if exists TenniStats;
create database if not exists TenniStats;
use TenniStats;

Create table Usuarios(
id int auto_increment primary key,
nickname varchar (50),
pass varchar (8)
);

Create table Jugadores (
ficha_federativa varchar (10) primary key,
nombre varchar (20),
apellidos varchar (50),
fecha_nacimiento date,
categoria enum ('BENJAMIN', 'ALEVIN', 'INFANTIL', 'CADETE', 'ABSOLUTO', 'SENIOR++'),
peso decimal (4, 2) check (peso>0),
altura decimal(3, 2) check (altura>0),
mano enum ('diestro 1', 'diestro 2', 'zurdo 2', 'zurdo 1')
);


Create table Partidos(
id_partido int auto_increment not null primary key,
fecha date,
ficha_jugador1 varchar (10),
ficha_jugador2 varchar (10),
lugar varchar (100),
tipo_superficie enum ('Tierra batida', 'Alvero', 'Cemento', 'Hierba', 'Otro'),
categoria enum ('BENJAMIN', 'ALEVIN', 'INFANTIL', 'CADETE', 'ABSOLUTO', 'SENIOR++'),
tipo_torneo varchar (40),
numero_juegos smallint,
numero_sets smallint,
foreign key (ficha_jugador1) references Jugadores(ficha_federativa) on delete cascade,
foreign key (ficha_jugador2) references Jugadores(ficha_federativa) on delete cascade
);

CREATE TABLE stats (
ficha_federativa varchar (10),
id_partido int,
fecha_partido date,
aces smallint,
doble_falta smallint,
primary key (ficha_federativa, id_partido),
foreign key (ficha_federativa) references jugadores (ficha_federativa) on delete cascade on update cascade,
foreign key (id_partido) references partidos (id_partido) on delete cascade on update cascade
);

Create table historico_stats (
ficha_jugador varchar (10) primary key,
numero_partidos_jugados int,
numero_partidos_ganados int,
aces int,
doble_falta int,
winners int,
errores int,
puntos_break_afrontados int,
porcentaje_primer_servicio decimal (4, 2),
porcentaje_primeros_ganados decimal (4, 2),
porcentaje_segundos_ganados decimal (4, 2),
porcentaje_puntos_servicio_ganados decimal (4, 2),
porcentaje_break_salvados decimal (4, 2),
puntos_break_ganados int,
puntos_break_jugados int,
porcentaje_break_ganados decimal (4, 2)
);

/*modificaciones de la tabla stats*/
Alter table stats 
add column winner int, 
add column errores int,
add column puntos_break_afrontados int,
add column porcentaje_primer_servicio decimal (4, 2),
add column porcentaje_primeros_ganados decimal (4, 2),
add column porcentaje_segundos_ganados decimal (4, 2),
add column porcentaje_puntos_servicio_ganados decimal (4, 2),
add column porcentaje_break_salvados decimal (4, 2),
add column puntos_break_ganados int,
add column puntos_break_jugados int,
add column porcentaje_break_ganados decimal (4, 2);



