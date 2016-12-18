<?php

use app\models\Result;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Общие показатели';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="date-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table date-table">
        <thead>
        <tr>
            <td  class = "header">Дата</td>
           <td class = "header">Общий расход</td>
            <td class = "header">Итого кликов</td>
            <td class = "header" >Конверсия</td>
            <td class = "header">Итого заявок</td>
            <td class = "header" >CPL</td>

        </tr>
        </thead>
        <tbody>
        <tbody>

    <?php

    foreach ($dates as $date){
        $result=new Result();
        $result->resolveDate($date);


        ?>
        <tr>
            <td class = "date"><?php echo date('d.m.Y', strtotime($date->date)) ?></td>
            <td  class = "total"><?php echo $result->total_rate ?></td>
            <td  class = "total"><?php echo $result->total_click ?></td>
            <td  class = "total"><?php echo ($result->conversion*100).' %' ?></td>
            <td  class = "total"><?php echo $result->total_order ?></td>
            <td  class = "total"><?php echo $result->total_CPL ?></td>

        </tr>
    <?php } ?>

        </tbody>
    </table>
   



    
    
    
    
    
</div>
