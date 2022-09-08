<?php
namespace app\models;

use yii\db\ActiveRecord;

class Veiculos extends ActiveRecord{

    public function rules(){
        return [
            [['modelo', 'fk_marca', 'modelo', 'ano', 'valor', 'zerokm'], 'required'],
            ['ano', 'status', 'integer']
        ];
    }

    public function attributeLabels(){
        return [
            'fk_marca' => 'Marca',
            'zerokm' => 'Zero Km?',
            'valor' => 'Valor Venda'
        ];
    }
}
?>