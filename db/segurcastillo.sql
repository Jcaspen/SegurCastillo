------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS clientes CASCADE;

CREATE TABLE clientes
(
    id            BIGSERIAL     PRIMARY KEY
  , dni           varchar(9)    UNIQUE NOT NULL
  , nombre        varchar(255)  NOT NULL
  , direccion     varchar(255)
  , telefono      numeric (9)   CONSTRAINT ck_telefono_9_digitos_min
                                CHECK      (telefono>=100000000)
  , fecha_nac     date          NOT NULL
  , carnet        varchar(40)
  , polizas       numeric(5)
);

DROP SEQUENCE IF EXISTS polizas_empresas CASCADE;

CREATE SEQUENCE polizas_empresas
  start with 1200000000
  increment by 1
  maxvalue 1299999999
  minvalue 1;
;

DROP TABLE IF EXISTS empresas CASCADE;

CREATE TABLE empresas
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_empresas')
  , cif                     varchar(9)        UNIQUE NOT NULL
  , tomador_dni             varchar(9)        NOT NULL
  , facturacion_anual       varchar (255)     NOT NULL
  , capital_asegurado       numeric(9)        DEFAULT '0'
  , prima                   numeric(9)        NOT NULL DEFAULT '0'
  , FOREIGN KEY (tomador_dni)
    REFERENCES clientes (dni) ON UPDATE CASCADE
);


-- Las pólizas de Vida engloba los seguros Vida, Salud y Plan de Pensiones
DROP SEQUENCE IF EXISTS polizas_vida CASCADE;

CREATE SEQUENCE polizas_vida
  start with 0100000000
  increment by 1
  maxvalue 0299999999
  minvalue 1;
;

DROP TABLE IF EXISTS vida CASCADE;

CREATE TABLE vida
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_vida')
  , tomador_dni             varchar(9)        NOT NULL
  , ocupacion               varchar(255)      NOT NULL
  , ingresos_anuales        varchar(255)
  , tipo_poliza             varchar(255)      DEFAULT 'vida'
  , ingreso_mensual         numeric(4)        DEFAULT '0'
  , capital                 numeric(9)        DEFAULT '0'
  , cuestionario            numeric(1)        NOT NULL
  , prima                   numeric(9)        DEFAULT '0'
  , FOREIGN KEY (tomador_dni)
    REFERENCES clientes (dni) ON UPDATE CASCADE
);


-- La Tabla hogar es la categoría que engloba los seguros Hogar y Comunidades

DROP SEQUENCE IF EXISTS polizas_hogar CASCADE;

CREATE SEQUENCE polizas_hogar
  start with 0700000000
  increment by 1
  maxvalue 0899999999
  minvalue 1;
;

DROP TABLE IF EXISTS hogares CASCADE;

CREATE TABLE hogares
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_hogar')
  , tomador_dni             varchar(9)        NOT NULL
  , direccion               varchar(255)      NOT NULL
  , poblacion               varchar(255)      NOT NULL
  , provincia               varchar(255)      NOT NULL
  , cp                      numeric(5)        NOT NULL
  , viviendas               numeric(5)        DEFAULT '1'
  , metros_cuadrados        numeric(5)        NOT NULL
  , capital_asegurado       numeric(9)        DEFAULT '0'
  , prima                   numeric(9)        DEFAULT '0'
  , FOREIGN KEY (tomador_dni)
    REFERENCES clientes (dni) ON UPDATE CASCADE
);

-- La tabla autos es la categoría que engloba los seguros de Autos, Bicis y embarcaciones

DROP SEQUENCE IF EXISTS polizas_autos CASCADE;

CREATE SEQUENCE polizas_autos
  start with 0500000000
  increment by 1
  maxvalue 0699999999
  minvalue 1;
;

DROP TABLE IF EXISTS autos CASCADE;

CREATE TABLE autos
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_autos')
  , tomador_dni             varchar(9)        NOT NULL
  , tipo_auto               varchar(255)      
  , marca                   varchar(255)      NOT NULL
  , modelo                  varchar(255)      NOT NULL
  , matricula               varchar(255)
  , caballos                numeric(5)        DEFAULT '0'
  , tipo_poliza             varchar(255)      DEFAULT 'autos'
  , capital_asegurado       numeric(9)        DEFAULT '0'
  , prima                   numeric(9)        DEFAULT '0'
  , FOREIGN KEY (tomador_dni)
    REFERENCES clientes (dni) ON UPDATE CASCADE
);

-- La tabla no vida es la categoria que engloba los seguros de Responsabilidad Civil
-- Defensa jurídica, Agricolas, Viajes y Decesos

DROP SEQUENCE IF EXISTS polizas_no_vida CASCADE;

CREATE SEQUENCE polizas_no_vida
  start with 0300000000
  increment by 1
  maxvalue 0499999999
  minvalue 1;
;

DROP TABLE IF EXISTS no_vida CASCADE;

CREATE TABLE no_vida
(
    id                      BIGSERIAL         PRIMARY KEY
  , poliza                  bigint            DEFAULT nextval('polizas_no_vida')
  , tomador_dni             varchar(9)        NOT NULL
  , riesgo                  varchar(255)      NOT NULL
  , integrantes             numeric(1)        NOT NULL
  , tipo_poliza             varchar(255)      DEFAULT 'decesos'
  , capital_asegurado       numeric(9)        DEFAULT '0'
  , prima                   numeric(9)        DEFAULT '0'
  , FOREIGN KEY (tomador_dni)
    REFERENCES clientes (dni) ON UPDATE CASCADE
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
