<?php

namespace app\widgets;

use yii\base\Widget;


class Card extends Widget{

    public $type;
    public $width;
    public $img;
    public $title;
    public $subTitle;
    public $text;
    public $btnLabel;
    public $btnAction;

    public function init(){

        parent::init();
        $this->type = ($this->type == null) ? 'basic' : $this->type;

    }

    public function run() {

            return $this->render('cardView',[
                'type' => $this->type,
                'width' => $this->width,
                'img' => $this->img,
                'title' => $this->title,
                'subTitle' => $this->subTitle,
                'text' => $this->text,
                'btnLabel' => $this->btnLabel,
                'btnAction' => $this->btnAction,
            ]);

    }
}