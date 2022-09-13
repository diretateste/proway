<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Veiculos;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;

class VeiculosController extends Controller{

    public function actionIndex(){

        $id = Yii::$app->request->get('id');
        
        if($id){
            $model = Veiculos::find()->joinWith(['marca as m'])->where(['fk_marca' => $id, 'm.status' => 1])->asArray()->all();
        } else {
            $model = Veiculos::find()->joinWith(['marca as m'])->where(['m.status' => 1])->asArray()->all();    
        }


        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionDetalhes($id){
        $model = Veiculos::findOne($id);

        return $this->render('detalhes',[
            'model' => $model,
        ]);
    }

}