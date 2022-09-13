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
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzQd6RtXLtoSPj_9oU7HRCKamPyNPem6GkGw&usqp=CAU',
                'titulo' => 'As melhores condições de pagamento',
                'texto' => 'Confira'
            ],
            [
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFQeRbBr0D_xs8wMM3exH3JJXmxZBfHo3QOg&usqp=CAU',
                'titulo' => 'Veículos novos e usados',
                'texto' => ''
            ],
            [
                'img' => 'https://fortiliveiculos.com.br/wp-content/uploads/2019/07/Consigna%C3%A7%C3%A3o-de-Ve%C3%ADculos-novos-e-Seminovos-fortili-veiculos.jpg',
                'titulo' => 'Todos os tipos de veículos',
                'texto' => 'Confira'
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