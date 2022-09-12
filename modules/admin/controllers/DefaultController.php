<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\LoginForm;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }

        return $this->render('index');
    }

    public function actionLogin(){

        if(!Yii::$app->user->isGuest){
            return $this->redirect(['index']);
        }

        $request = Yii::$app->request;
        $model = new LoginForm();
        if($request->isPost && $model->load($request->post()) && $model->login()){
            return $this->redirect(['index']);
        }



        return $this->render('login',[
            'model' => $model
        ]);

    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->redirect(['index']);
    }

}
