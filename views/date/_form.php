<?php

$JS = <<< JS
//


    $(".digital-input").keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    });


 

    $(".float-digital").keypress(function(key) {

        var regex = new RegExp("^[0-9.,]+$");
        var str = String.fromCharCode(!key.charCode ? key.which : key.charCode);console.log(str);

        var val=$(this).val();
        if ((val.indexOf(".") >= 0) && (str=='.' || str==',')){
            return false;
        }

        if (val.indexOf(".") >= 0){
            var parts = val.split('.');
            if(parts[1].length>1){
                return false;
            }
        }

        if (regex.test(str)) {
            return true;
        }

        key.preventDefault();
        return false;
    });


    $(".float-digital").keyup(function() {
        var val=$(this).val();
        $(this).val(val.replace(/,/g, '.'));
    });
    
// $('.container').on('click','.time a.delete',function() {
// 	var th=$(this),
// 		container=th.closest('div.comment'),
// 		id=container.attr('id').slice(1);
//		
// 	if (confirm('Вы действительно хотите удалить комментарий  #'+id+'?')) {	
// 		$.post(th.attr('href'),function(){container.slideUp()})		
// 		}				
// 	return false;
// });
//
// $('.container').on('click','.time a.approve',function() {
// 	var th=$(this);				
// 	$.post(th.attr('href'));		
// 	return false;	
// });
JS;

$this->registerJs($JS, yii\web\View::POS_READY);


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Date */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="date-form">

    <?php $form = ActiveForm::begin(); ?>
    <hr>

    <div class="row">

        <div class="col-lg-3">
            <br>
            <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'ru',
                'dateFormat' => 'dd/MM/yyyy'
            ]) ?>
        </div>

        <div class="col-lg-4">
            <div class="panel direct">
                <div class="panel-heading">Директ</div>
                <div class="panel-body">
                    <?= $form->field($model, 'direct_rate')->textInput(['maxlength' => true, 'class' => 'float-digital form-control']) ?>
                    <?= $form->field($model, 'direct_click')->textInput(['class' => 'digital-input form-control']) ?>
                    <?= $form->field($model, 'direct_order')->textInput(['class' => 'digital-input form-control'])  ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel adwords">
                <div class="panel-heading">AdWords</div>
                <div class="panel-body">
                    <?= $form->field($model, 'adwords_rate')->textInput(['maxlength' => true, 'class' => 'float-digital form-control']) ?>
                    <?= $form->field($model, 'adwords_click')->textInput(['class' => 'digital-input form-control'])  ?>
                    <?= $form->field($model, 'adwords_order')->textInput(['class' => 'digital-input form-control'])  ?>
                </div>
            </div>
        </div>
    </div>

<hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Внести данные' : 'Изменить данные', ['class' =>  'btn btn-primary btn btn-lg center-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>