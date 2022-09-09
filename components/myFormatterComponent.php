<?php

namespace app\components;

use yii\i18n\Formatter;

class myFormatterComponent extends Formatter{

    public function asStatus($n){
        return $n == 1 ? 'Ativo' : 'Inativo';
    }

    public function asZerokm($n){
        return $n == 1 ? 'Sim' : 'Não';
    }

    public function asCelular($n){

        $cel = '('.substr($n,0,2).')';
        $cel .= substr($n,2,5).'-';
        $cel .= substr($n,7,4);

        return $cel;
    }


    public function asCPF($n){

        $cel = substr($n,0,3).'.';
        $cel .= substr($n,3,3).'.';
        $cel .= substr($n,6,3).'-';
        $cel .= substr($n,9,2);

        return $cel;
    }


}