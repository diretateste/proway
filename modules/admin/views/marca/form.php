<?php

use app\uteis\Uteis;
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

echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model,'nome',['options' => ['class' => 'form-group col-sm-12']]);
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model, 'status',['options' => ['class' => 'form-group col-sm-12']])->dropdownList(
    Uteis::getStatus(), 
    [
        'prompt' => 'Selecione'
    ]);
echo Html::endTag('div');

echo Html::submitButton('Enviar',[
    'class' => 'btn btn-primary'
]);

ActiveForm::end();