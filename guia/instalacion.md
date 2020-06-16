# Instrucciones de instalación y despliegue

## En local
#### Debes tener:
- *PHP 7.3.0*
- *PostgreSQL 11.7 o superior*
- *Composer*
- *Git*


#### Instalación:

1. Crear un directorio `segurcastillo` y nos cambiamos a ese directorio.

2. Ejecutamos los siguientes comandos:
```
git clone https://github.com/Jcaspen/segurcastillo.git

```
3. Ejecutamos el script de Instalación

./script.sh

4. Ejecutamos el comando `make serve`

5. Para acceder introducimos en el navegador `localhost:8080`.

## En la nube

#### Requisitos:
- *Heroku cli*

#### Despliegue:

1.  Realizamos un fork a el proyecto en: https://github.com/jcaspen/segurcastillo

2.  Creamos una aplicación en heroku y la enlazamos con nuestro forkeo en github.

3. Añadiremos el add-on *Heroku Postgres*

4.  Nos vamos al directorio donde hemos clonado la aplicación y ejecutamos:
```
heroku run bash
Una vez dentro ejecutamos el script de instalación:
 ./script.sh
```
5.  Configuramos las variables de entorno:
    * `YII_ENV` con el modo en el que se desplegará la aplicación.
    * `DATABASE_URL` con la URL de la base de datos proporcionada en el paso 3.
    *  `TZ` con la zona horaria en la que estes.

6. La aplicación está lista para funcionar
