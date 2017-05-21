<?php

use app\models\Date;
use app\models\Result;
use miloschuman\highcharts\Highcharts;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


$this->title = 'Список активных компаний ';
$this->params['breadcrumbs'][] = $this->title;
?>


<h1 style="display: inline"><?= Html::encode($this->title) ?></h1>

<div class="row">
    <div class="date-index col-lg-12">


        <!--        --><?php //d($rec) ?>
        <!--        --><?php //d($res) ?>
        <?php foreach ($res as $champ) { ?>

            <a href=<?php echo Url::to(['bet/campaign', 'id' => $champ['Id']]); ?> type="button" class="btn btn-default"
               style="width: 750px;padding: 2px; overflow: hidden; margin: 5px;text-align: left">
                <span style="color: #0000CC"><?php echo $champ['Id'] ?></span> <span
                    style="color:black"><?php echo $champ['Name'] . ' ' ?></span>
            </a>
            <br>
        <?php } ?>

    </div>
</div>