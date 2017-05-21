<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = 'Компания № ' . $chId;
$this->params['breadcrumbs'][] = ['label' => 'Ставки', 'url' => Url::toRoute('bet/index')];
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title . ', список групп:') ?></h1>


<div class="row">
    <div class="date-index col-lg-12">


        <!--        --><?php //d($rec) ?>
        <!--        --><?php //d($res) ?>
        <?php foreach ($res as $adGroup) { ?>

            <a href=<?php echo Url::to(['bet/group', 'chId' => $chId, 'id' => $adGroup['Id']]); ?> type="button"
               class="btn btn-default"
               style="width: 750px;padding: 2px; overflow: hidden; margin: 5px;text-align: left">
                <span style="color: #0000CC"><?php echo $adGroup['Id'] ?></span> <span
                    style="color:black"><?php echo $adGroup['Name'] . ' ' ?></span>
            </a>
            <?php if ($adGroup['ServingStatus'] == 'RARELY_SERVED') echo '<span
                    style="color:red"> Мало показов по данной группе. </span>' ?>
            <br>
        <?php } ?>

    </div>
</div>
