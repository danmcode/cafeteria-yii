<?php

use yii\db\Migration;

/**
 * Class m230712_203737_add_create_at_to_product_table
 */
class m230712_203737_add_create_at_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'created_at', $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230712_203737_add_create_at_to_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230712_203737_add_create_at_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
