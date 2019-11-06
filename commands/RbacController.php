<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // agrega el permiso "crear un Usuario"
        $crearUser = $auth->createPermission('crearUsuario');
        $crearUser->description = 'Crea un usuario';
        $auth->add($crearUser);

        /*
        // agrega el rol "author" y le asigna el permiso "createPost"
        $author = $auth->createRole('admini');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        */

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $crearUser);

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
