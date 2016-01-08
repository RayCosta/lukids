<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Compra]].
 *
 * @see Compra
 */
class CompraQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Compra[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Compra|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}