<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //agrega el permiso "crear un Usuario"
        $crearUsuario = $auth->createPermission('crearUsuario');
        $crearUsuario->description = 'Crea un usuario';
        $auth->add($crearUsuario);

        //agrega el permiso "modificar a un Usuario"
        $modificarUsuario = $auth->createPermission('modificarUsuario');
        $modificarUsuario->description = 'Modifica un usuario';
        $auth->add($modificarUsuario);

        //agrega el permiso "Borrar un Usuario"
        $borrarUsuario = $auth->createPermission('borrarUsuario');
        $borrarUsuario->description = 'Borra un usuario';
        $auth->add($borrarUsuario);

        //agrega el permiso "Emitir Pólizas"
        $emitirPoliza = $auth->createPermission('emitirPoliza');
        $emitirPoliza->description = 'Emite una Póliza';
        $auth->add($emitirPoliza);

        //agrega el permiso modificar polizas
        $modificarPoliza = $auth->createPermission('modificarPoliza');
        $modificarPoliza->description = 'Modifica una Póliza';
        $auth->add($modificarPoliza);

        //agrega el permiso de eliminar polizas
        $eliminarPoliza = $auth->createPermission('eliminarPoliza');
        $eliminarPoliza->description = 'Elimina una Póliza';
        $auth->add($eliminarPoliza);

        //agrega el permiso "Comunidad"
        $controlComunidad = $auth->createPermission('controlComunidad');
        $controlComunidad->description = 'Control sobre Comunidades';
        $auth->add($controlComunidad);

        //agrega el permiso "Planes de pensiones"
        $controlPlanp = $auth->createPermission('controlPlanp');
        $controlPlanp->description = 'Control sobre Planes de pensiones';
        $auth->add($controlPlanp);

        //agrega el permiso de eliminar "Empresas"
        $controlEmpresa = $auth->createPermission('controlEmpresa');
        $controlEmpresa->description = 'Control sobre Empresas';
        $auth->add($controlEmpresa);

        //agrega el permiso de eliminar "Control de Ayudas"
        $controlAyudas = $auth->createPermission('controlAyudas');
        $controlAyudas->description = 'Control sobre Ayudas';
        $auth->add($controlAyudas);


        //agrega el permiso de eliminar "Asignar Permisos"
        $asignaPermisos = $auth->createPermission('asignaPermisos');
        $asignaPermisos->description = 'Asigna permisos';
        $auth->add($asignaPermisos);


        //agrega el permiso de eliminar "Control de Siniestros"
        $controlSiniestros = $auth->createPermission('controlSiniestros');
        $controlSiniestros->description = 'Controla los Siniestros';
        $auth->add($controlSiniestros);


        //agrega el permiso de eliminar "Control de Reclamaciones"
        $controlReclamaciones = $auth->createPermission('controlReclamaciones');
        $controlReclamaciones->description = 'Controla las reclamaciones';
        $auth->add($controlReclamaciones);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $crearUsuario);
        $auth->addChild($admin, $modificarUsuario);
        $auth->addChild($admin, $borrarUsuario);

        //agrego Rol de Mediador
        $mediador = $auth->createRole('mediador');
        $auth->add($mediador);

        //agrego Rol de Agente
        $agente = $auth->createRole('agente');
        $auth->add($agente);



        /*
        // agrega el rol "admin" y le asigna el permiso "updatePost"
        // más los permisos del rol "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);
        */

        // asigna roles a usuarios. 1 y 2 son IDs devueltos por IdentityInterface::getId()
        // usualmente implementado en tu modelo User.
        $auth->assign($mediador, 1);
        $auth->assign($admin, 2);
    }
}
