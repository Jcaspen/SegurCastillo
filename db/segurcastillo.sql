------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS clientes CASCADE;

CREATE TABLE clientes
(
    id            BIGSERIAL     PRIMARY KEY
  , nombre        varchar(255)       
);
