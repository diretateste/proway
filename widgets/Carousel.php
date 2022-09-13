<?php

namespace app\widgets;

use yii\base\Widget;

class Carousel extends Widget{

    public $controls;
    public $indicators;
    public $fade;
    public $data;

    public function init(){

        parent::init();

    }

    public function run() {

            return $this->render('carouselView',[
                'controls' => $this->controls,
                'indicators' => $this->indicators,
                'fade' => $this->fade,
                'data' => $this->data,
            ]);

    }
}


