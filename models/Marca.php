<?php
namespace app\models;

use yii\db\ActiveRecord;

class Marca extends ActiveRecord{

    public static function tableName()
    {
        return 'marcas';
    }

    public function rules(){
        return [
            [['nome', 'status'], 'required'],
            [['status'], 'integer'],
        ];
    }

    public function attributeLabels(){
        return [
            'nome' => 'Nome',
            'status' => 'Status',
        ];
    }

}