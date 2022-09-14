<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Veiculos extends ActiveRecord{

    public function rules(){
        return [
            [['modelo', 'fk_marca', 'ano', 'valor', 'status'], 'required'],
            ['ano', 'integer'],
            ['modelo', 'filter', 'filter' => function($value) {return mb_strtoupper($value, 'utf-8');}]
        ];
    }

    public function attributeLabels(){
        return [
            'id' => 'Código',
            'fk_marca' => 'Marca',
            'status' => 'Disponível?',
            'valor' => 'Valor Venda'
        ];
    }

    public function getMarca(){
        return $this->hasOne(Marca::className(), ['id' => 'fk_marca']);
    }
}
?>