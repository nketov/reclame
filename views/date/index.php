<?php

use app\models\Date;
use app\models\Result;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;


$this->title = 'Показатели рекламы';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 style="display: inline"><?= Html::encode($this->title) ?></h1>
<br>
<br>

<div class="row">
    <div class="date-index col-lg-12">

        <?php

        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => [
                    'text' => "Расход ",
                ],
                'xAxis' => [
                    'categories' => array_keys($monthResult->days)
                ],
                'yAxis' => [
                    'title' => '',
                ],


                'series' => [
                    [
                        'type' => 'spline',
                        'name' => "Расход",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'total_rate';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => 'rgba(250,50,50, 1)'
                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "AdWords расход",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'adwords_rate';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//
//                        'color' => 'rgba(12,255,120, 0.5)'
//                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "Директ расход",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'direct_rate';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//                        'color' => ' rgba(255,217,102,1)'
//                    ]

                ],
            ]

        ]);
        ?>
    </div>
</div>


<br>
<div class="row">
    <div class="date-index col-lg-12">
        <?php

        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => [
                    'text' => "CPL",
                ],
                'xAxis' => [
                    'categories' => array_keys($monthResult->days)
                ],
                'yAxis' => [
                    'title' => '',
                ],


                'series' => [
                    [
                        'type' => 'spline',
                        'name' => "CPL",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'total_CPL';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => 'rgba(250,250,50, 1)'
                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "AdWords CPL",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'adwords_CPL';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//
//                        'color' => 'rgba(12,255,120, 0.5)'
//                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "Директ CPL",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'direct_CPL';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//                        'color' =>  ' rgba(255,217,102,1)'
//                    ],
                ],
            ]

        ]);
        ?>

    </div>
</div>
<br>

<br>
<div class="row">
    <div class="date-index col-lg-12">
        <?php

        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => [
                    'text' => "Заявки",
                ],
                'xAxis' => [
                    'categories' => array_keys($monthResult->days)
                ],
                'yAxis' => [
                    'title' => '',
                ],


                'series' => [
                    [
                        'type' => 'spline',
                        'name' => "Заявки",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'total_order';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => 'rgba(50,250,50, 1)'
                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "AdWords заявки",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'adwords_order';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//
//                        'color' => 'rgba(12,255,120, 0.5)'
//                    ],
//                    [
//                        'type' => 'spline',
//                        'name' => "Директ заявки",
//                        'data' => array_values(array_map(function ($day) {
//                            $name = 'direct_order';
//                            return (float)$day->{$name};
//                        }, $monthResult->days)),
//                        'color' => ' rgba(255,217,102,1)'
//                    ],
                ],
            ]

        ]);
        ?>

    </div>
</div>






