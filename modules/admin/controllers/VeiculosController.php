<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Veiculos;
use app\uteis\Uteis;
use Yii;
use yii\bootstrap4\Html;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class VeiculosController extends Controller{

    public function actionIndex(){
        $query = Veiculos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => ['modelo' => SORT_ASC]
            ]
        ]);



        $this->view->title = 'Veículos em Estoque';
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'action' => Html::a('Cadastrar Veículos', ['create'], ['class' => 'btn btn-primary'])
        ]);
    }

    public function actionCreate(){

        $model = new Veiculos;
        $request = Yii::$app->request;

        if($request->isPost && $model->load($request->post())){
            
            if($model->save()){
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel inserir o registro');
        }

        $this->view->title = 'Cadastrar Veículo';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);

    }

    public function actionUpdate($id){

        $model = Veiculos::findOne($id);
        $request = Yii::$app->request;

        if($model->load($request->post()) && $model->validate()){
            
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Alterado com sucesso');
                return $this->redirect(['index']);
            } 

            Yii::$app->session->setFlash('error', 'Não foi possivel editar o registro');
        }

        $this->view->title = 'Alterar Veículo';
        return $this->render('form',[
            'model' => $model,
            'addAction' => Html::a('VOLTAR', ['index'], ['class' => 'btn btn-secondary'])
        ]);
    }

    public function actionDelete($id){
        $model = Veiculos::findOne($id);
        
        if($model && $model->delete()){
            Yii::$app->session->setFlash('success', 'Registro Excluido');            
        } else {
            Yii::$app->session->setFlash('error', 'Registro não Excluido');
        }
       
        return $this->redirect(['index']);
    }

    public function actionChangestatus(){
        $req = Yii::$app->request;

        if($req->isAjax){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $veiculos = Veiculos::findOne($req->post('id'));
            $veiculos->status = $req->post('status');

            if ($veiculos->save()){
                return [
                    'data' => [
                        'status' => 'success',
                        'value' => $req->post('status'),
                        'label' => Uteis::onVstatus($req->post('status')),
                        'msg' => 'Status alterado com sucesso.'
                    ],
                    'code' => 0
                ];
            } else {
                if ($veiculos->save()){
                    return [
                        'data' => [
                            'status' => 'error',
                            'msg' => 'Erro na alteração do status.'
                    ],
                    'code' => 1
                ];   
            }
        }
    }
}

}

?>
