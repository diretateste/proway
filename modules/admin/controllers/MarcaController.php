<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Marca;
use Yii;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class MarcaController extends Controller{

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
        $query = Marca::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => ['nome' => SORT_ASC]
            ]
        ]);

        $this->view->title = 'Marcas';
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'action' => Html::a('Cadastrar Marca', ['create'], ['class' => 'btn btn-primary'])
        ]);
    }

    public function actionCreate(){

        $model = new Marca();
        $request = Yii::$app->request;

        if($request->isPost && $model->load($request->post())){
            
            if($model->save()){
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel inserir o registro');
        }

        $this->view->title = 'Cadastrar Marca';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);

    }

    public function actionUpdate($id){

        $model = Marca::findOne($id);
        $request = Yii::$app->request;

        if($model->load($request->post()) && $model->validate()){
            
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Alterado com sucesso');
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel editar o registro');
        }

        $this->view->title = 'Alterar Marca';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);
    }

    public function actionDelete($id){
        $model = Marca::findOne($id);
        
        if($model && $model->delete()){
            Yii::$app->session->setFlash('success', 'Registro Excluido');            
        } else {
            Yii::$app->session->setFlash('error', 'Registro não Excluido');
        }
       
        return $this->redirect(['index']);
    }


    // public function actionChangestatus(){
    //     $req = Yii::$app->request;

    //     if($req->isAjax){
    //         Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //         $categoria = Marca::findOne($req->post('id'));
    //         $categoria->status = $req->post('status');

    //         if($categoria->save()){
    //             return [
    //                 'data'=> [
    //                     'status' => 'success',
    //                     'value' => $req->post('status'),
    //                     'label' => Uteis::onStatus($req->post('status')),
    //                     'msg' => 'Status alterado com sucesso'
    //                 ],
    //                 'code' => 0
    //             ];
    //         } else {
    //             return [
    //                 'data'=> [
    //                     'status' => 'error',
    //                     'msg' => 'Não foi possivel alterar'
    //                 ],
    //                 'code' => 0
    //             ];
    //         }
    //     }       

}