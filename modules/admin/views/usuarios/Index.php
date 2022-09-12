<?php

use app\uteis\Uteis;
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
        'nome',
        'email:email',
        [
            'class' => ActionColumn::class,
            'header' => 'Ações',
            'headerOptions' => ['style' => 'width:60px;', 'class' => 'text-primary'],
            'template'=>'{update}{delete}',

        ],
    ]
]);
