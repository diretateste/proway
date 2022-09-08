<?php

use yii\db\Migration;

/**
 * Class m220908_225043_criartabelaVeiculos
 */
class m220908_225043_criartabelaVeiculos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('veiculos',[
           'id' => $this->primaryKey(),
           'fk_marca' => $this->integer()->notNull(),
           'modelo' => $this->text()->notNull(),
           'ano' => $this->integer()->notNull(),
           'valor' => $this->decimal(10,2)->notNull(),
           'zerokm' => $this->smallInteger(1)->notNull()->defaultValue(1),
           'dataCadastro' => $this->timestamp()->defaultExpression('NOW()'),
           'dataAlteracao' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);

        
        $this->addForeignKey('fk_veiculos_marca_id','veiculos','fk_marca','marcas','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //remove FK
        $this->dropForeignKey('fk_veiculos_marca_id','veiculos');
        //remove a tabela
        $this->dropTable('veiculos');

        return false;
    }



}
