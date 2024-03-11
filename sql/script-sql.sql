create database if not exists dashboard_ramal default character set = utf8mb4 default collate utf8mb4_general_ci;
use dashboard_ramal;

create table if not exists ramais (
idramal smallint unsigned not null auto_increment,
numero smallint unsigned,
nome varchar(255),
ip varchar(255),
status enum('OK', 'Unspecified'),
created_at timestamp not null default current_timestamp(),
constraint pk_ramais primary key(idramal)
) default charset = utf8mb4 default collate = utf8mb4_general_ci;

select * from ramais;

# insert ramais(numero, nome, ip, status) values(7000, 7000, '181.219.125.7', 'OK');
# insert ramais(numero, nome, ip, status) values(7001, 7001, '181.219.125.7', 'OK');
# insert ramais (numero, nome, ip, status) values(7004, 7002, null, 'Unspecified');
# insert ramais(numero, nome, ip, status) values(7003, 7003, null, 'Unspecified');
# insert ramais(numero, nome, ip, status) values(7002, 7004, '181.219.125.7', 'OK');

create table if not exists filas (
idfila smallint unsigned not null auto_increment,
numero smallint unsigned,
status enum('In use', 'Ring', 'Unavailable', 'paused', 'Not in use'),
user varchar(100),
created_at timestamp not null default current_timestamp(),
constraint pk_fila primary key(idfila)
) default charset = utf8mb4 default collate = utf8mb4_general_ci;

select * from filas;

# insert filas(numero, status, user) values(7000, 'In use', 'Chaves');
# insert filas(numero, status, user) values(7001, 'Ring', 'Kiko');
# insert filas(numero, status, user) values(7002, 'Unavailable', 'Chiquinha');
# insert filas(numero, status, user) values(7003, 'Unavailable', 'Nhonho');
# insert filas(numero, status, user) values(7004, 'Not in use', 'Godines');