# Dificultades encontradas

* Encontre dificultades a la hora de implementar algunos widgets externos que me rompieron el archivo json y el composer en la nube me fallaba. Decidí eliminar el widget pues no tenia soporte con bootstrap4.
* La validación en cliente mediante Ajax aun con al petición correcta no valida correctamente.
* El despliegue en una maquina virtual con php 7.4 provoco error en el programa no consiguiendo su vista.

# Elemento de innovación.

 El elemento de innovación consiste en un control de acceso basado en roles (RBAC) principalmente.

 Principales dificultades encontradas con el elemento de innovación:

 * A la hora de insertar las tablas necesarias para el RBAC al crearlas manualmente me provocó fallos en la estabilidad de la aplicación por lo que tuve que recurrir a una migración de tablas que incorporo en un script para la instalación de la aplicación.
 * La forma de introducir el rol en el usuario y en la tabla me costó conseguir que lo introdujera correctamente.
 * A la hora de utilizar el App::user ->can('permiso') no se por que razón introduce el id del usuario en forma de texto en el if condicional no pudiendo eliminarlo de la vista.

Respecto al segundo elemento de innovación no presentado pero si incluido que es un plugin que exporta a pdf las pólizas tuve problemas con el composer y su versión. Tras modificar el bootstrap a 4 consegui que funcionara.
