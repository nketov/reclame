<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "Показатели рекламы",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
//            ['label' => 'Общие показатели', 'url' => ['/date']],
//            ['label' => 'О сайте', 'url' => ['/about']],
//            ['label' => 'Контакты', 'url' => ['/contact']],

            ['label' => 'Графики', 'url' => ['/charts']],
            ['label' => 'Ставки', 'url' => ['/bets']],
            
            Yii::$app->user->isGuest ? ('<li></li>') :
                ['label' => 'Внести данные', 'url' => ['/date/create']],

            Yii::$app->user->isGuest ? (
            ['label' => "Вход", 'url' => ['/login']]
            ) :
                (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Выход  <i class="fa fa-user"></i>  (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'user']
                    )
                    . Html::endForm()
                    . '</li>'
                ),
        ],

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
<!--                <p class="pull-left"> Краматорск <img src="/images/ukraine.png"> --><?// //= date('Y') ?><!--</p>-->
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
