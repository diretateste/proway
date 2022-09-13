<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
]
);

echo Html::a('VOLTAR', ['index'], ['class' => 'btn btn-dark']);
