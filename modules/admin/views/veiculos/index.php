<?php

use app\modules\admin\models\Marca;
use app\uteis\Uteis;
use app\widgets\Switches;
use yii\bootstrap4\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

echo <<<HTML
<div class="row">
    <div class="col-md-8">
        <h2>$this->title</h2>
    </div>
    <div class="col-md-4 text-right">
       $action  
    </div>
</div>
HTML;


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => LinkPager::class
    ],
    'layout' => '{items} <div class="row"><div class="col-md-8">{pager}</div> <div class="col-md-4 text-right">{summary}</div></div>',
    'columns' => [
        [
            'attribute' => 'id',
            'label' => 'Código'
        ],
        'modelo',
        [
            'attribute' => 'fk_marca',
            'value' => 'marca.nome'
        ],
        'ano',
        'valor:Currency',
        // [
        //     'attribute' => 'zerokm',
        //     'content' => function ($dataProvider) {
        //         return Uteis::onZerokm($dataProvider->zerokm);
        //     }
        // ],
        [
            'attribute' => 'status',
            'headerOptions' => [
                'class' => 'w40'
            ],
            'content' => function($model, $key, $index, $grid){
                return Switches::widget([
                    'field' => 'status'.$key,
                    'id' => $model->id,
                    'value' => $model->status,
                    'label' => Uteis::onVstatus($model->status),
                    'action' => Url::base(true).'/index.php?r=admin/veiculos/changestatus'
                ]);
            }
        ],
        [
            'class' => ActionColumn::class,
            'header' => 'Ações',
            'headerOptions' => ['style' => 'width:60px;', 'class' => 'text-primary'],
            'template' => '{update}{delete}',

        ],
    ]
]);
