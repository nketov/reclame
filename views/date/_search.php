<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'direct_rate') ?>

    <?= $form->field($model, 'direct_click') ?>

    <?= $form->field($model, 'direct_order') ?>

    <?php // echo $form->field($model, 'adwords_rate') ?>

    <?php // echo $form->field($model, 'adwords_click') ?>

    <?php // echo $form->field($model, 'adwords_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
