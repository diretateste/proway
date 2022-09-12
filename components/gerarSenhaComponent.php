<?php
namespace app\components;

use yii\base\Component;

class gerarSenhaComponent extends Component {
    public function gerarSenha () {
        $strings = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numeros ="0123456789";
        $shflStrings = str_shuffle($strings);
        $shflNumeros = str_shuffle($numeros);
        $senha = substr($shflStrings,0,4).substr($shflNumeros,0,4);
        return $senha;

    }
}
