<?php

use app\components\gerarSenhaComponent;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

echo <<<HTML
<div class="row">     
    <div class="col-md-10">         
        <h2>$this->title</h2>     
    </div>     
    <div class="col-md-2 text-right">         
        $addAction     
    </div> 
</div> 
HTML;

$form = ActiveForm::begin();
$senha = Yii::$app->gerarSenhaComponent;


echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model,'nome',['options' => ['class' => 'form-group col-sm-12']]);
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model,'email',['options' => ['class' => 'form-group col-sm-6']])->input('email'); 
echo $form->field($model, 'password',['options' => ['class' => 'form-group col-sm-6']])->input('text',['value' => $senha->gerarSenha()]);

echo Html::endTag('div');

echo Html::submitButton('Enviar',[
    'class' => 'btn btn-primary'
]);

ActiveForm::end();