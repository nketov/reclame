<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Date */

$this->title = 'Внести данные';
$this->params['breadcrumbs'][] = ['label' => 'Данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
