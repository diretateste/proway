<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface {

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

    /**
    * {@inheritdoc}
    */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($email)
    {
        return self::findOne(['email' => $email]); 
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}