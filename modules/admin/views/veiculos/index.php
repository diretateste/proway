<?php


use app\uteis\Uteis;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$form = ActiveForm::begin();

echo $form->field($model,'marca');
echo $form->field($model,'modelo');
echo $form->field($model,'ano');
echo $form->field($model,'valor');
echo $form->field($model, 'zerokm')->dropdownList(Uteis::getStatus(),['prompt' => 'Selecione']);

echo Html::submitButton('Salvar', ['class' => 'btn btn-primary']);
ActiveForm::end();

?>