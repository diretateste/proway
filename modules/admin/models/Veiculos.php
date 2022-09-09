<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Veiculos extends ActiveRecord{

    public function rules(){
        return [
            [['modelo', 'fk_marca', 'ano', 'valor', 'zerokm'], 'required'],
            ['ano', 'integer']
        ];
    }

    public function attributeLabels(){
        return [
            'id' => 'Código',
            'fk_marca' => 'Marca',
            'zerokm' => 'Zero Km?',
            'valor' => 'Valor Venda'
        ];
    }

    public function getMarca(){
        return $this->hasOne(Marca::className(), ['id' => 'fk_marca']);
    }
}
?>