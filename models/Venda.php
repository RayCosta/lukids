<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property integer $id
 * @property string $dt_venda
 * @property integer $id_cliente
 * @property double $vlr_total
 *
 * @property Cliente $idCliente
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dt_venda'], 'safe'],
            [['id_cliente'], 'integer'],
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
            'dt_venda' => Yii::t('app', 'Dt Venda'),
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'vlr_total' => Yii::t('app', 'Vlr Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }

    /**
     * @inheritdoc
     * @return VendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendaQuery(get_called_class());
    }
}
