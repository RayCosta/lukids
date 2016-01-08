<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property integer $id
 * @property string $nome
 * @property string $endereco
 * @property string $telefone
 * @property string $site
 * @property string $email
 *
 * @property Compra[] $compras
 */
class Fornecedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fornecedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome', 'endereco', 'email'], 'string', 'max' => 150],
            [['telefone'], 'string', 'max' => 11],
            [['site'], 'string', 'max' => 255],
            [['nome'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome'),
            'endereco' => Yii::t('app', 'Endereco'),
            'telefone' => Yii::t('app', 'Telefone'),
            'site' => Yii::t('app', 'Site'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['id_fornecedor' => 'id']);
    }

    /**
     * @inheritdoc
     * @return FornecedorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FornecedorQuery(get_called_class());
    }
}
