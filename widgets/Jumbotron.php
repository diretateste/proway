<?php

namespace app\widgets;

use yii\base\Widget;


class Jumbotron extends Widget{

    public $titulo, $texto1, $texto2, $btnLabel, $btnAction;

    public function init(){

        parent::init();


    }

    public function run() {

        $html = <<<HTML
            <div class="jumbotron">
                 <h1 class="display-6"> $this->titulo </h1>
                 <p class="lead"> $this->texto1</p>
                 <hr class="my-6">
                 <p>$this->texto2</p>
                 <a class="btn btn-primary btn-md" href="$this->btnAction" role="button">$this->btnLabel</a>
            </div>
        HTML;

        return $html;

    }
}