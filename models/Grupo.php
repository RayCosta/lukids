<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Produto[] $produtos
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'descricao'], 'required'],
            [['id'], 'integer'],
            [['descricao'], 'string', 'max' => 50],
            [['descricao'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descricao' => Yii::t('app', 'Descricao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['grupo' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GrupoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GrupoQuery(get_called_class());
    }
}
