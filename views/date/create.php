<?php


use kartik\growl\Growl;


$this->title = 'Внести данные';
$this->params['breadcrumbs'][] = ['label' => 'Общие показатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-create">

    <h1>
        <button class="btn btn-default btn-lg clear" data-toggle="modal" data-target=".modal_date">Внести
            данные
        </button>
    </h1>

    <?php
    if (Yii::$app->session->hasFlash('save') === true) {

        echo Growl::widget([
            'type' => Growl::TYPE_SUCCESS,
            'icon' => 'glyphicon glyphicon-floppy-disk',
            'body' => Yii::$app->session->getFlash('save')
        ]);


    }
    ?>


    <table class="table date-table">
        <thead>
        <tr>
            <td rowspan="2" class="header">Дата</td>
            <td colspan="3" class="header">Директ</td>
            <td colspan="3" class="header">Adwords</td>
        </tr>
        <tr>
            <td class="direct">Расход ( руб.)</td>
            <td class="direct">Клики</td>
            <td class="direct">Заявки</td>
            <td class="adwords">Расход ( руб.)</td>
            <td class="adwords">Клики</td>
            <td class="adwords">Заявки</td>
        </tr>
        </thead>
        <tbody>
        <tbody>
        <?php
        foreach ($dates as $date) {
            ?>
            <tr>
                <td class="date"><?php echo date('d.m.Y', strtotime($date->date)) ?></td>
                <td class="direct"><?php echo $date->direct_rate ?></td>
                <td class="direct"><?php echo $date->direct_click ?></td>
                <td class="direct"><?php echo $date->direct_order ?></td>
                <td class="adwords"><?php echo $date->adwords_rate ?></td>
                <td class="adwords"><?php echo $date->adwords_click ?></td>
                <td class="adwords"><?php echo $date->adwords_order ?></td>
            </tr>
        <?php } ?>
        </tbody>


    </table>


</div>


<div class="modal fade modal_date" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Внести данные</h4>
            </div>
            <div class="modal-body">
                <?php

                echo $this->render('_form', [
                    'model' => $model,
                ]);
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <button type="submit" form="target-form" class="save btn btn-primary">Сохранить Данные</button>
            </div>
        </div>
    </div>
</div>