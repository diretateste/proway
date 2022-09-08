<?php

use yii\db\Migration;

/**
 * Class m220908_223744_criartabelaUsuarios
 */
class m220908_223744_criartabelaUsuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32),
            'email' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'data_cadastro' => $this->timestamp()->defaultExpression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220908_223744_criartabelaUsuarios cannot be reverted.\n";

        return false;
    }
    */
}
