------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS clientes CASCADE;

CREATE TABLE clientes
(
    id            BIGSERIAL     PRIMARY KEY
  , dni           varchar(9)    NOT NULL UNIQUE
  , nombre        varchar(255)  NOT NULL
  , direccion     varchar(255)
  , telefono      numeric (9)   CONSTRAINT ck_telefono_9_digitos_min
                                CHECK      (telefono>=100000000)
  , fecha_nac     date          NOT NULL
  , carnet        varchar(40)
);

CREATE SEQUENCE polizas_empresas
  start with 120000000
  increment by 1
  maxvalue 9999999999
  minvalue 1;
;

DROP TABLE IF EXISTS empresas CASCADE;

CREATE TABLE empresas
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_empresas')
  , empresas_dni            varchar(9)
  , empresas_nombre         varchar(255)
  , empresas_direccion      varchar (255)
  , FOREIGN KEY (empresas_dni,empresas_nombre,empresas_direccion)
    REFERENCES clientes (dni,nombre,direccion)
);

DROP TABLE IF EXISTS planp CASCADE;

CREATE TABLE planp
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS comunidades CASCADE;

CREATE TABLE comunidades
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS hogares CASCADE;

CREATE TABLE hogares
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS salud CASCADE;

CREATE TABLE salud
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS vida CASCADE;

CREATE TABLE vida
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS decesos CASCADE;

CREATE TABLE decesos
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS autos CASCADE;

CREATE TABLE autos
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS viajes CASCADE;

CREATE TABLE viajes
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS bicis CASCADE;

CREATE TABLE bicis
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS embarcaciones CASCADE;

CREATE TABLE embarcaciones
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS rcs CASCADE;

CREATE TABLE rcs
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS defensas CASCADE;

CREATE TABLE defensas
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS agricolas CASCADE;

CREATE TABLE agricolas
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)
);

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios
(
    id         BIGSERIAL   PRIMARY KEY
  , login      VARCHAR(50) NOT NULL UNIQUE
                           CONSTRAINT ck_login_sin_espacios
                           CHECK (login NOT LIKE '% %')
  , password   VARCHAR(60) NOT NULL
  , created_at TIMESTAMP   NOT NULL DEFAULT current_timestamp
  ,rol         VARCHAR(60) NOT NULL
);


INSERT INTO clientes (dni,nombre,direccion,telefono,fecha_nac,carnet)
   VALUES('75168040S', 'jose luis', 'luchadores...',856878987, '1988/01/24', 'b');

INSERT INTO usuarios (login, password,rol)
   VALUES ('jlcast', crypt('jlcast1988', gen_salt('bf', 10)),'mediador')
        , ('admin', crypt('admin', gen_salt('bf', 10)),'admin');
