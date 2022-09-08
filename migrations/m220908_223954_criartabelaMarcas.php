<?php

use yii\db\Migration;

/**
 * Class m220908_223954_criartabelaMarcas
 */
class m220908_223954_criartabelaMarcas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('marcas', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'status' => $this->integer(1)->notNull()->defaultValue(1),
            'dataAlteracao' => $this->timestamp()->defaultExpression('NOW()'),
            'dataCadastro' => $this->timestamp()->defaultExpression('NOW()')
        ]);
    }


    public function safeDown()
    {
        $this->dropTable('marcas');
    }

 
}
