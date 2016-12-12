<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'date',
            'direct_rate',
            'direct_click',
            'direct_order',
            'adwords_rate',
            'adwords_click',
            'adwords_order',

        ],
    ]); ?>
</div>
