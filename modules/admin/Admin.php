<?php

namespace app\modules\admin;


class Admin extends \yii\base\Module {

    public function init()
    {
        parent::init();
    
        $this->layout = 'main';

        \Yii::configure($this, require __DIR__ . '/config/web.php');

        \Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\admin\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => ['admin'],
            'identityCookie' => ['name' => 'admin', 'httpOnly' => true],
            'idParam' => 'admin_id', //this is important !
        ]
        );

    }
}
