<?php
namespace app\uteis;

class Uteis{

    public static function getStatus(){       
        return ['Não', 'Sim'];

    }
    public static function onStatus($st){
        $status = ['Não', 'Sim'];
        return $status[$st];  
   }
}
?>