<?php


use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;


$this->title = 'Сделки';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 style="display: inline"><?= Html::encode($this->title) ?></h1>

<br>
<br>

<?php
//d($contracts);
?>


<div class="row">
    <div class="date-index col-lg-12">

        <?php

        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
            ],
            'options' => [
                'title' => [
                    'text' => 'Количество сделок',
                ],
                'xAxis' => [
                    'categories' => array_keys($contracts)
                ],
                'yAxis' => [
                    'title' => ''
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Количество сделок',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
//                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],

                'tooltip' => [
                    'pointFormat' => '<span style="color:{point.color}">{series.name}</span> : <b>{point.y}
                                                <span style="color:{point.color}"></span></b><br/>
                                                <span style="color:{point.color}">Сделки</span> : <b>{point.z}</b>',
                    'backgroundColor' => '#222',
                    'style' => ["color" => "#DDD",
                        "cursor" => "default",
                        "fontSize" => "16px",
                        "pointerEvents" => "none",
                        "whiteSpace" => "nowrap"],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => "Количество сделок",
                        'data' =>
                            array_values(array_map(function ($m) {
                                return ["y" => $m['количество'], 'z' => $m['сделки']];
                            }, $contracts)),

                        'color' => 'rgba(50,50,250, 1)'
                    ],
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
                    'text' => 'Сумма сделок',
                ],
                'xAxis' => [
                    'categories' => array_keys($contracts)
                ],
                'yAxis' => [
                    'title' => ''
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Сумма сделок',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
//                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],
                'tooltip' => [
                    'pointFormat' => '<span style="color:{point.color}">{series.name}</span> : <b>{point.y}
                                                <span style="color:{point.color}"></span></b><br/>
                                                <span style="color:{point.color}">Сделки</span> : <b>{point.z}</b>',
                    'backgroundColor' => '#222',
                    'style' => ["color" => "#DDD",
                        "cursor" => "default",
                        "fontSize" => "16px",
                        "pointerEvents" => "none",
                        "whiteSpace" => "nowrap"],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => "Сумма сделок",
                        'data' =>
                            array_values(array_map(function ($m) {
                                return ["y" => $m['сумма']/100, 'z' => $m['сделки']];
                            }, $contracts)),


                        'color' => 'rgba(250,250,25, 1)'
                    ],
                ],
            ]

        ]);

        ?>
    </div>
</div>

