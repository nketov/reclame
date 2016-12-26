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
                    'text' => 'CPL',
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
                            'html' => 'CPL',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
//
                            ],
                        ],
                    ],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => "Общий CPL",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'total_CPL';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => 'rgba(155,155,155, 1)'
                    ],
                    [
                        'type' => 'column',
                        'name' => "AdWords CPL",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'adwords_CPL';
                            return (float)$day->{$name};
                        }, $monthResult->days)),

                        'color' => 'rgba(12,255,120, 1)'
                    ],
                    [
                        'type' => 'column',
                        'name' => "Директ CPL",
                        'data' => array_values(array_map(function ($day) {
                            $name = 'direct_CPL';
                            return (float)$day->{$name};
                        }, $monthResult->days)),
                        'color' => ' rgba(255,217,102,1)'
                    ],

                ],
            ]

        ]);
        ?>
    </div>
</div>



