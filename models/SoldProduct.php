<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sold_product".
 *
 * @property int $id
 * @property int $product_id
 * @property int $amount
 *
 * @property Product $product
 */
class SoldProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sold_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'amount'], 'required'],
            [['product_id', 'amount'], 'default', 'value' => null],
            [['product_id', 'amount'], 'integer', 'min' => 0],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'amount' => 'Amount',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|ProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * {@inheritdoc}
     * @return SoldProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SoldProductQuery(get_called_class());
    }
}
