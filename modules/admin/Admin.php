<?php

namespace app\modules\admin;


class Admin extends \yii\base\Module {

    public function init()
    {
        parent::init();
    
        $this->layout = 'main';

        \Yii::configure($this, require __DIR__ . '/config/web.php');

    }
}
