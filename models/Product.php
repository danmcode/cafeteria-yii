<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $reference
 * @property float $price
 * @property float $weight
 * @property string $category
 * @property int $stock
 *
 * @property SoldProduct[] $soldProducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'reference', 'price', 'weight', 'category', 'stock'], 'required'],
            [['price', 'weight'], 'number', 'min' => 0],
            [['category'], 'string'],
            [['stock'], 'default', 'value' => null],
            [['stock'], 'integer', 'min' => 0],
            [['name', 'reference'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'reference' => 'Reference',
            'price' => 'Price',
            'weight' => 'Weight',
            'category' => 'Category',
            'stock' => 'Stock',
        ];
    }

    /**
     * Gets query for [[SoldProducts]].
     *
     * @return \yii\db\ActiveQuery|SoldProductQuery
     */
    public function getSoldProducts()
    {
        return $this->hasMany(SoldProduct::class, ['product_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
