<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'modelo',
        [                      
            'attribute' => 'fk_marca',
            'value' => $model->marca->nome
        ],
        'ano',        
        'valor:Currency',   
        'status:disponivel',  
    ],
]
);

echo Html::a('VOLTAR', ['index'], ['class' => 'btn btn-dark']);
