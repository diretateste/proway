<?php

use app\models\Marca;
use app\widgets\Card;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

echo "<form>";
echo Html::beginTag('div', ['class' => 'row mt-3']);
echo Html::hiddenInput('r', 'veiculos/index');
echo Html::dropDownList('id', Yii::$app->request->get('id'), ArrayHelper::map(Marca::find()->all(), 'id', 'nome'), ['class' => 'col-sm-8', 'prompt' => 'Selecione a Marca']);
echo Html::submitButton('Buscar',['class' => 'btn btn-primary col-sm-4']);
echo Html::endTag('div');
echo '</form>';

echo Html::beginTag('div', ['class' => 'row mt-3']);
foreach($model as $valor) {
    $status = $valor['status'] == 1 ? 'Disponível' : 'Indisponível';
    $val = Yii::$app->formatter->asCurrency($valor['valor']);
    echo Html::beginTag('div', ['class' => 'col-sm-4', 'style' => 'margin-bottom: 10px;']);
    echo Card::widget([
        'type' => 'basic',
        'width' => '300px',
        'title' => $valor['marca']['nome']. ' - '.$valor['modelo'],
        'subTitle' => $status, 
        'text' => "Ano: {$valor['ano']} <br> Valor: {$val}",
        'btnLabel' => 'Detalhes',
        'btnAction' => Url::base(true).'/index.php?r=veiculos/detalhes&id='.$valor['id'],
    ]);
    echo Html::endTag('div');
}
echo Html::endTag('div');
