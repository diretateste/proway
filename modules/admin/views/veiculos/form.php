<?php

use app\modules\admin\controllers\MarcaController;
use app\modules\admin\models\Marca;
use app\uteis\Uteis;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

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

$appLang = Yii::$app->language;
$formatter = Yii::$app->formatter;

$form = ActiveForm::begin();

echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model,'modelo',['options' => ['class' => 'form-group col-sm-6']])->textInput(['style' => 'text-transform: uppercase']);
echo $form->field($model,'fk_marca',['options' => ['class' => 'form-group col-sm-6']])->dropdownList(
    ArrayHelper::map(Marca::find()->all(), 'id', 'nome'),
    [
        'prompt' => 'Selecione'

    ]);
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'row']);
echo $form->field($model,'ano',['options' => ['class' => 'form-group col-sm-4']])->input('number');
echo $form->field($model,'valor',['options' => ['class' => 'form-group col-sm-4']])->input('decimal')->widget(MaskedInput::class, ['mask' => ['99999.99', '999999.99']]);;


echo $form->field($model, 'status',['options' => ['class' => 'form-group col-sm-4']])->dropdownList(
    Uteis::getVstatus(), 
    [
        'prompt' => 'Selecione'
    ]);
echo Html::endTag('div');
echo Html::activeHiddenInput($model,'dataCadastro', ['value' => date('Y-m-d H:i:s')]);

echo Html::submitButton('Enviar',[
    'class' => 'btn btn-primary'
]);

ActiveForm::end();

?>