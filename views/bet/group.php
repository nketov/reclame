<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title =  'Группа № '. $groupId;
$this->params['breadcrumbs'][] = ['label' => 'Ставки', 'url' => Url::toRoute('bet/index')];
$this->params['breadcrumbs'][] = ['label' => 'Компания № '. $chId, 'url' => Url::toRoute(['bet/campaign', 'id' => $chId])];
$this->params['breadcrumbs'][] =$this->title;
?>


    <h1><?= Html::encode($this->title. ', список ключевых фраз:') ?></h1>



   