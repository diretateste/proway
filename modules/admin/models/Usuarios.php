<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Usuarios extends ActiveRecord{

    public static function tableName()
    {
        return 'user';
    }

    public function rules(){
        return [
            [['nome', 'email', 'password'], 'required'],
            ['email', 'email']
        ];
    }

    public function attributeLabels(){
        return [
            'password' => 'Senha',
            'email' => 'E-mail (Login)'
        ];
    }

}