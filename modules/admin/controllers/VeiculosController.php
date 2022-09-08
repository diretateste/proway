<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class VeiculosController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
