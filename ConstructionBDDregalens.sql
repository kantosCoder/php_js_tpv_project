create database TPV;

use TPV;

create table productos (
	id_producto int NOT NULL AUTO_INCREMENT,
	nombre varchar (30),
    precio_unidad decimal,
    PVP decimal,
    codigo_barras varchar (30),
    IVA decimal,
    stock int,
    constraint pk_producto
	Primary key (id_producto)
 );
 
 create table cliente (
	id_cliente int NOT NULL AUTO_INCREMENT,
	nombre varchar (30),
	password varchar (30),
	rango varchar (30),
	telefono int,
	direccion varchar(30),
	email varchar(30),
    constraint pk_cliente
	Primary key (id_cliente)
 );
 
  create table categoria (
	id_categoria int NOT NULL AUTO_INCREMENT,
	nombre_cat varchar (30),
    constraint pk_categoria
	Primary key (id_categoria)
 );
 
   create table proveedor (
	id_proveedor int NOT NULL AUTO_INCREMENT,
	nombre_prov varchar (30),
    telefono int,
    constraint pk_proveedor
	Primary key (id_proveedor)
 );
 
   create table reservas (
	id_reserva int NOT NULL AUTO_INCREMENT,
	fecha date,
    id_cliente int,
    foreign key (id_cliente)
    references cliente(id_cliente),
    constraint pk_reservas
	Primary key (id_reserva)
 );
 
    create table reserva_productos (
	id_reserva int ,
	id_producto int,
    cantidad int,
	foreign key (id_reserva)
    references reservas(id_reserva),
    foreign key (id_producto)
    references productos(id_producto),
    constraint pk_reserva_productos
	Primary key (id_reserva, id_producto)
 );
 
	create table categoria_producto (
	id_producto int,
    id_categoria int,
    foreign key (id_producto)
    references productos (id_producto),
	foreign key (id_categoria)
    references categoria (id_categoria),
    constraint pk_categoria_producto
	Primary key (id_producto, id_categoria)
 );
 
 	create table proveedor_producto (
    id_proveedor int ,
    id_producto int,
	foreign key (id_proveedor)
    references proveedor (id_proveedor),
	foreign key (id_producto)
    references productos(id_producto),
    constraint pk_proveedor_producto
	Primary key (id_proveedor, id_producto)
 );
 
  create table ticket (
	id_ticket int ,
	id_producto int,
	id_cliente int,
    cantidad int,
	aparcado boolean,
	devuelto boolean,
    foreign key (id_producto)
    references productos(id_producto),
	foreign key (id_cliente)
    references cliente(id_cliente),
    constraint pk_ticket
	Primary key (id_ticket, id_producto, id_cliente)
 );
INSERT INTO categoria (nombre_cat)
VALUES ('regalos');

INSERT INTO CLIENTE (nombre, password, rango, telefono)
VALUES ('admin', 'admin', 'admin', '0');

INSERT INTO cliente (id_cliente, nombre, password, rango, telefono)
VALUES (999999,"default","278319313193def","default",0);
 