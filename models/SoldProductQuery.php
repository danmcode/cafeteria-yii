<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SoldProduct]].
 *
 * @see SoldProduct
 */
class SoldProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SoldProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SoldProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
