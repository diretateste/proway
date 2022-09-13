<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class RbacController extends Controller{

    public function actionIndex(){
        $auth = Yii::$app->authManager;

        //criar papeis (niveis)
        $admin = $auth->createRole('administrador');
        $super = $auth->createRole('super');
        $user = $auth->createRole('usuario');

        //adicionar papeis no gerenciador
        $auth->add($admin);
        $auth->add($super);
        $auth->add($user);

        //criar permissões a ações
        $create = $auth->createPermission('create');
        $update = $auth->createPermission('update');
        $delete = $auth->createPermission('delete');
        $view = $auth->createPermission('index');


        //adcionar permissões
        $auth->add($create);
        $auth->add($update);
        $auth->add($delete);
        $auth->add($view);

        //informando o que cada usuario pode fazer
        $auth->addChild($admin, $create);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $view);

        $auth->addChild($super, $create);
        $auth->addChild($super, $update);
        $auth->addChild($super, $view);

        $auth->addChild($user, $create);
        $auth->addChild($user, $view);


        //vincular usuarios a determinado perfil
        $auth->assign($admin, 1);
        $auth->assign($super, 2);
        $auth->assign($user, 3);
        
    }

    public function actionVerificaPermissao($usuario){
        $auth = Yii::$app->authManager;

        echo "podem listar {$auth->checkAccess($usuario, 'create')}<br>";
        echo "podem listar {$auth->checkAccess($usuario, 'update')}<br>";
        echo "podem listar {$auth->checkAccess($usuario, 'delete')}<br>";
        echo "podem listar {$auth->checkAccess($usuario, 'index')}<br>";
    }

}