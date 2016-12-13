<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Date */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'ru',
                'dateFormat' => 'yyyy-MM-dd'
            ]) ?>
        </div>

        <div class="col-lg-4">
            <div class="panel direct">
                <div class="panel-heading">Директ</div>
                <div class="panel-body">
                    <?= $form->field($model, 'direct_rate')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'direct_click')->textInput() ?>
                    <?= $form->field($model, 'direct_order')->textInput() ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel adwords">
                <div class="panel-heading">AdWords</div>
                <div class="panel-body">
                    <?= $form->field($model, 'adwords_rate')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'adwords_click')->textInput() ?>
                    <?= $form->field($model, 'adwords_order')->textInput() ?>
                </div>
            </div>
        </div>
    </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Внести данные' : 'Изменить данные', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>


</div>