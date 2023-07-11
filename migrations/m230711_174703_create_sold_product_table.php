<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sold_product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m230711_174703_create_sold_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sold_product}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-sold_product-product_id}}',
            '{{%sold_product}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-sold_product-product_id}}',
            '{{%sold_product}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-sold_product-product_id}}',
            '{{%sold_product}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-sold_product-product_id}}',
            '{{%sold_product}}'
        );

        $this->dropTable('{{%sold_product}}');
    }
}
