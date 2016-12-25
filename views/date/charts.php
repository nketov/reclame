<?php

use app\models\Date;
use app\models\Result;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;


$this->title = 'Графики';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 style="display: inline"><?= Html::encode($this->title) ?></h1>

<?= Html::beginForm(
    ['charts'], 'post', ['style' => "display:inline"]
);
foreach (array_keys($months) as $m) {
    $values[$m] = $m;
}
echo Html::dropDownList('month', $month, $values, ['onchange' => 'this.form.submit()']);
Html::endForm() ?>


<div class="row">
    <div class="date-index col-lg-12">

        <?php

        //d(array_map(function($day) {
        //    $name='direct_rate';
        //    return $day ->{$name};
        //},$monthResult->days));exit;

        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => [
                    'text' => 'Расход',
                ],
                'xAxis' => [
                    'categories' => array_keys($monthResult->days)
                ],
                'yAxis' => [
                    'title' => ''
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Расход',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
//                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => "Общий расход",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'total_rate';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => 'rgba(155,155,155, 1)'
                    ],
                    [
                        'type' => 'column',
                        'name' => "AdWords расход",
                        'data' => array_values(array_map(function ($day) {
                        $name = 'adwords_rate';
                        return (float)$day->{$name};
                    }, $monthResult->days)),

                        'color' => 'rgba(12,255,120, 1)'
                    ],
                    [
                        'type' => 'column',
                        'name' => "Директ расход",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'direct_rate';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => ' rgba(255,217,102,1)'
                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => 'Average',
//                        'data' => [3, 2.67, 3, 6.33, 3.33],
//                        'marker' => [
//                            'lineWidth' => 2,
//                            'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
//                            'fillColor' => 'white',
//                        ],
//                    ],

                   
                ],
            ]

        ]);

        ?>


    </div>
</div>


<!--<div class="row">-->
<!--    <div class="date-index col-lg-8">-->
<!---->
<!---->
<!--        <table class="table date-table">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <td class="header">Дата</td>-->
<!--                <td class="header">Общий расход</td>-->
<!--                <td class="header">Итого кликов</td>-->
<!--                <td class="header">Конверсия</td>-->
<!--                <td class="header">Итого заявок</td>-->
<!--                <td class="header">CPL</td>-->
<!---->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!---->
<!--            --><?php
//
//
//            foreach ($monthResult->days as $day => $result) {
//
//                if (!empty($result)) {
//
//                    ?>
<!--                    <tr>-->
<!--                        <td class="date">--><?php //echo date('d.m.Y', strtotime($day)) ?><!--</td>-->
<!--                        <td class="total">--><?php //echo number_format($result->total_rate, 2) ?><!--</td>-->
<!--                        <td class="total">--><?php //echo $result->total_click ?><!--</td>-->
<!--                        <td class="total">--><?php //echo number_format(($result->conversion * 100), 2) . ' %' ?><!--</td>-->
<!--                        <td class="total">--><?php //echo $result->total_order ?><!--</td>-->
<!--                        <td class="total">--><?php //echo number_format($result->total_CPL, 2) ?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?php
//                } else {
//                    ?>
<!--                    <tr>-->
<!--                        <td class="date">--><?php //echo date('d.m.Y', strtotime($day)) ?><!--</td>-->
<!--                        <td class="date"-->
<!--                            colspan="5">--><?php //echo "Данные за " . date('d.m.Y', strtotime($day)) . " ещё не заполнены" ?><!--</td>-->
<!--                    </tr>-->
<!--                --><?php //}
//            }
//            $periodName = ($month === 'Весь период') ? " весь период " : " месяц ";
//
//            ?>
<!---->
<!---->
<!--            <tr class="month-sum">-->
<!--                <td class="date">--><?php //echo "За" . $periodName . "общее: " ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->sum_rate ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->sum_click ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->sum_conversion ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->sum_order ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->sum_CPL ?><!--</td>-->
<!--            <tr>-->
<!---->
<!--            <tr class="month-average">-->
<!--                <td class="date">--><?php //echo "За" . $periodName . "среднее: " ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->average_rate ?><!--</td>-->
<!--                <td class="total">--><?php //echo "" ?><!--</td>-->
<!--                <td class="total">--><?php //echo "" ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->average_order ?><!--</td>-->
<!--                <td class="total">--><?php //echo $monthResult->average_CPL ?><!--</td>-->
<!--            <tr>-->
<!---->
<!---->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--    <div class="date-index col-lg-3">-->
<!---->
<!--        <table class="table mini-table">-->
<!--            <tbody>-->
<!--            <tr>-->
<!--                <td class="mini-1">Средний CPL</td>-->
<!--                <td class="mini-1">--><?php //echo number_format($monthResult->sum_CPL, 2)?><!--  ₽</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-2">Средняя конверсия</td>-->
<!--                <td class="mini-2">--><?php //echo number_format($monthResult->sum_conversion*100, 2)?><!-- %</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-3">CPL в Директе</td>-->
<!--                <td class="mini-3">--><?php //echo  $monthResult->average_direct_CPL?><!--  ₽</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-4">CPL в Adwords</td>-->
<!--                <td class="mini-4">--><?php //echo  $monthResult->average_adwords_CPL?><!--  ₽</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-5">К-во кликов в день</td>-->
<!--                <td class="mini-5">--><?php //echo  number_format($monthResult->average_click,0)?><!--</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-6">К-во лидов в день</td>-->
<!--                <td class="mini-6">--><?php //echo  number_format($monthResult->average_order,0)?><!--</td>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td class="mini-7">Расход в день</td>-->
<!--                <td class="mini-7">--><?php //echo  $monthResult->average_rate?><!-- ₽</td>-->
<!--            <tr>-->
<!---->
<!--            </tbody>-->
<!--        </table>-->
<!---->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->
