<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Marca;
use app\modules\admin\models\User;
use app\modules\admin\models\Usuarios;
use Yii;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class UsuariosController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionIndex(){
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => ['nome' => SORT_ASC]
            ]
        ]);

        $this->view->title = 'Usuários';
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'action' => Html::a('Cadastrar Usuários', ['create'], ['class' => 'btn btn-primary'])
        ]);
    }

    public function actionCreate(){

        $model = new User();
        $request = Yii::$app->request;

        if($request->isPost && $model->load($request->post())){
            
            $model->password = md5($model->password);
            if($model->save()){
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel inserir o registro');
        }

        $this->view->title = 'Cadastrar Usuários';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);

    }

    public function actionUpdate($id){

        $model = User::findOne($id);
        $request = Yii::$app->request;

        if($model->load($request->post()) && $model->validate()){
            
            $model->password = md5($model->password);
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Alterado com sucesso');
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel editar o registro');
        }

        $this->view->title = 'Alterar Usuário';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);
    }

    public function actionDelete($id){
        $model = User::findOne($id);
        
        if($model && $model->delete()){
            Yii::$app->session->setFlash('success', 'Registro Excluido');            
        } else {
            Yii::$app->session->setFlash('error', 'Registro não Excluido');
        }
       
        return $this->redirect(['index']);
    }


    

}