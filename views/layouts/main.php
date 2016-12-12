<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\ControlPanelWidget;
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
        'brandLabel' => "<img src='/images/logo.png'>",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/date']],
            
//            ['label' => 'О блоге', 'url' => ['/about']],
//            ['label' => 'Контакты', 'url' => ['/contact']],

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

<!--        <div class="container">-->
<!--            <div class="row">-->
<!---->
                <div class="col-lg-12">
                    <?= $content ?>
                </div>
<!---->
<!--                <div class="col-lg-3">-->
<!--                    --><?//
//                    echo ControlPanelWidget::widget() ?>
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->

    </div>
</div>

<footer class="footer">
    <div class="container">
<!--        <p class="pull-left"> Краматорск <img src="/images/ukraine.png"> --><?//= date('Y') ?><!--</p>-->

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
