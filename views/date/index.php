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



    <table class="table date-table">
        <thead>
        <tr>
            <td rowspan="2"  class = "date">Дата</td>
            <td colspan="3" class = "direct">Директ</td>
            <td colspan="3" class = "adwords">Adwords</td>
        </tr>
        <tr>
            <td class = "direct">Расход  ( руб.)</td>
            <td class = "direct">Клики</td>
            <td class = "direct" >Заявки</td>
            <td class = "adwords">Расход  ( руб.)</td>
            <td class = "adwords" >Клики</td>
            <td class = "adwords">Заявки</td>
        </tr>
        </thead>
        <tbody>
        <tbody>
        <?php
        foreach ($dates as $date) {
            ?>
            <tr>
                <td class = "date"><?php echo date('d.m.Y', strtotime($date->date)) ?></td>
                <td  class = "direct"><?php echo $date->direct_rate ?></td>
                <td  class = "direct"><?php echo $date->direct_click ?></td>
                <td  class = "direct"><?php echo $date->direct_order ?></td>
                <td  class = "adwords"><?php echo $date->adwords_rate ?></td>
                <td  class = "adwords"><?php echo $date->adwords_click ?></td>
                <td  class = "adwords"><?php echo $date->adwords_order ?></td>
            </tr>
        <?php } ?>
        </tbody>

        </tbody>
        </table>



    
    
    
    
    
</div>
