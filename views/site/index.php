<?php

use app\widgets\Carousel;
use app\widgets\Jumbotron;

?>
<?= Carousel::widget([
        'controls' => true,
        'indicators' => true,
        'fade' => true,
        'data' => [
            [
                'img' => 'https://img.olhardigital.com.br/wp-content/uploads/2022/04/homem-no-sol-capa-e-interna-1024x568.jpg',
                'titulo' => 'Sol',
                'texto' => 'texto de teste'
            ],
            [
                'img' => 'https://st.depositphotos.com/1010338/2099/i/600/depositphotos_20999947-stock-photo-tropical-island-with-palms.jpg',
                'titulo' => 'Arvores',
                'texto' => 'outro teste'
            ],
            [
                'img' => 'https://resultadosdigitais.com.br/files/2015/08/por-do-sol-e1440783856626.jpg',
                'titulo' => 'Outro Titulo',
                'texto' => 'Já tinha esse widget'
            ]
        ]
    ]) ?>


<?= Jumbotron::widget([
        'titulo' => 'Congratulations!',
        'texto1' => 'You have successfully created your Yii-powered application.!',
        'texto2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas laoreet eros non mi bibendum viverra. Morbi purus massa, sodales in eros quis, elementum tempus orci.',
        'btnLabel' => 'Get started with Yii',
        'btnAction' => 'http://www.yiiframework.com',
    ]) ?>