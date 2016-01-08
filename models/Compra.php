<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property integer $id
 * @property string $dt_compra
 * @property integer $id_fornecedor
 * @property double $vlr_total
 * @property string $dt_pagto
 *
 * @property Fornecedor $idFornecedor
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_compra', 'dt_pagto'], 'safe'],
            [['id_fornecedor'], 'integer'],
            [['vlr_total'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dt_compra' => Yii::t('app', 'Dt Compra'),
            'id_fornecedor' => Yii::t('app', 'Id Fornecedor'),
            'vlr_total' => Yii::t('app', 'Vlr Total'),
            'dt_pagto' => Yii::t('app', 'Dt Pagto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id' => 'id_fornecedor']);
    }

    /**
     * @inheritdoc
     * @return CompraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompraQuery(get_called_class());
    }
}
