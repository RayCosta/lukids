<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\icons\Icon;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
  <?php 
  $itemsMenu = 
      [
            ['label' => '<span class="glyphicon glyphicon-home "></span> Principal', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-barcode "></span> Produtos', 'url' => ['/site/index']],
            ['label' => '<span class="glyphicon glyphicon-question-sign"></span> Sobre', 'url' => ['/site/about']],
            ['label' => '<span class="glyphicon glyphicon-phone "></span> Contato', 'url' => ['/site/contact']],
       ];
    if   ( Yii::$app->user->isGuest) {
          $itemsMenu[] =   ['label' => 'Login', 'url' => ['/site/login']];         
     } else {
           $itemsMenu[] =   ['label' => '<span class="glyphicon glyphicon-home "></span> Vendas', 'url' => ['/site/index']];
           $itemsMenu[] =   ['label' => '<span class="glyphicon glyphicon-home "></span> Compras', 'url' => ['/site/index']];
           $itemsMenu[] =   [
                    'label' => 'Sair (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
               ];
          
        };
//        echo '<pre>';
//        var_dump($itemsMenu);
//          echo '</pre>';
//        die;
  ?>
    .  
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="glyphicon glyphicon-apple"></i>  Lu Kids',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $itemsMenu,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Lu Kids <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
