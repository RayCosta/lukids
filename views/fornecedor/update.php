<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fornecedor',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fornecedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fornecedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
