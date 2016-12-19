<?php

use app\models\Date;
use app\models\Result;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Общие показатели';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::beginForm();
foreach (array_keys($months) as $m) {
    $values[$m] = $m;
}
echo Html::dropDownList('month', $month, $values, ['onchange' => 'this.form.submit()']);
Html::endForm() ?>
<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table date-table">
        <thead>
        <tr>
            <td class="header">Дата</td>
            <td class="header">Общий расход</td>
            <td class="header">Итого кликов</td>
            <td class="header">Конверсия</td>
            <td class="header">Итого заявок</td>
            <td class="header">CPL</td>

        </tr>
        </thead>
        <tbody>
        <tbody>

        <?php
        $sum_rate = 0;
        $sum_click = 0;
        $sum_order = 0;
        $sum_CPL = 0;
        $amount=0;

        foreach ($months[$month] as $day) {
            $date = Date::findOne(['date' => $day]);
            $result = new Result();
            if (!empty($date)) {
                $result->resolveDate($date);
                $sum_rate += $result->total_rate ;
                $sum_click += $result->total_click;
                $sum_order += $result->total_order ;
                $sum_CPL += $result->total_CPL ;


                $amount++;
                ?>
                <tr>
                    <td class="date"><?php echo date('d.m.Y', strtotime($date->date)) ?></td>
                    <td class="total"><?php echo  number_format($result->total_rate,2) ?></td>
                    <td class="total"><?php echo $result->total_click ?></td>
                    <td class="total"><?php echo number_format(($result->conversion * 100),2) . ' %' ?></td>
                    <td class="total"><?php echo $result->total_order ?></td>
                    <td class="total"><?php echo number_format($result->total_CPL,2) ?></td>
                </tr>
            <?php


            } else {
                ?>
                <tr>
                    <td class="date"><?php echo date('d.m.Y', strtotime($day)) ?></td>
                    <td class="date"
                        colspan="5"><?php echo "Данные за " . date('d.m.Y', strtotime($day)) . " ещё не заполнены" ?></td>
                </tr>
            <?php }
        }
        $periodName= ($month === 'Весь период')? " весь период " :" месяц ";
        $amount= $amount ? $amount : 1;
        ?>


        <tr class="month-sum">
            <td class="date"><?php echo "За".$periodName ."общее: " ?></td>
            <td class="total"><?php echo number_format($sum_rate,2) ?></td>
            <td class="total"><?php echo $sum_click ?></td>
            <td class="total"><?php echo number_format(($sum_click==0) ? 0: round($sum_order/$sum_click, 4),4) . ' %' ?></td>
            <td class="total"><?php echo $sum_order ?></td>
            <td class="total"><?php echo ($sum_order==0) ? 0: round($sum_rate/$sum_order, 2) ?></td>
        <tr>

        <tr class="month-average">
            <td class="date"><?php echo "За".$periodName .": " ?></td>
            <td class="total"><?php echo number_format($sum_rate/$amount,2)?></td>
            <td class="total"><?php echo "" ?></td>
            <td class="total"><?php echo "" ?></td>
            <td class="total"><?php echo number_format($sum_order/$amount,2) ?></td>
            <td class="total"><?php  echo number_format($sum_CPL/$amount ,2) ?></td>
        <tr>


        </tbody>
    </table>


</div>
