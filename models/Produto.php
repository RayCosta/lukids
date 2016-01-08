<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $id
 * @property integer $grupo
 * @property string $descricao
 * @property resource $foto
 * @property integer $qtde
 * @property string $prc_custo
 * @property string $prc_venda
 *
 * @property Grupo $grupo0
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'grupo', 'descricao'], 'required'],
            [['id', 'grupo', 'qtde'], 'integer'],
            [['foto'], 'string'],
            [['prc_custo', 'prc_venda'], 'number'],
            [['descricao'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'grupo' => Yii::t('app', 'Grupo'),
            'descricao' => Yii::t('app', 'Descricao'),
            'foto' => Yii::t('app', 'Foto'),
            'qtde' => Yii::t('app', 'Qtde'),
            'prc_custo' => Yii::t('app', 'Prc Custo'),
            'prc_venda' => Yii::t('app', 'Prc Venda'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo0()
    {
        return $this->hasOne(Grupo::className(), ['id' => 'grupo']);
    }

    /**
     * @inheritdoc
     * @return ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProdutoQuery(get_called_class());
    }
}
