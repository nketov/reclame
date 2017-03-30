<?php


use yii\helpers\Html;



$this->title = 'Ставки';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 style="display: inline"><?= Html::encode($this->title) ?></h1>


<div class="row">
    <div class="date-index col-lg-12">
        <h1 ><span style="color: #0000aa">Слава</span> <span style="color:yellow"> Україні!</span></h1>
        <?php d($rec) ?>
        <?php d($res) ?>
    </div>
</div>




