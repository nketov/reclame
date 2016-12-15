<?php

$JS = <<< JS

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
    
 $('.date-form').on('click','button.save',function(event) {
  
  
    var date = $(".datepicker").val();  
 
      $.ajax({
        type:'post',
        url: 'confirm.html?date='+date,
        async :false       
        }).done(function(result) {

        if (result){   	 
 	  	        if (!confirm('Запись за '+result+ ' существует, заменить её новыми данными?'))
 	  	    {
 	  	      event.preventDefault();
 	  	      return false; 
 	  	  } 	  	  
 	  	  return true;
 	 } 	 
});
         
         
 
	
 
 
 
	// var th=$(this),
	// 	container=th.closest('div.comment'),
	// 	id=container.attr('id').slice(1);
	//	
	// if (confirm('Вы действительно хотите удалить комментарий  #'+id+'?')) {	
	// 	$.post(th.attr('href'),function(){container.slideUp()})		
	// 	}				
	// return false;
});

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

        <div class="col-lg-1">
        </div>

        <div class="col-lg-3">
            <div class="panel date">
                <div class="panel-heading">Дата</div>
                <br>
                <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control datepicker',
                        'style' => "margin-top:50px;"
                    ],
                    'language' => 'ru',
                    'dateFormat' => 'dd/MM/yyyy'
                ]) ?>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel direct">
                <div class="panel-heading">Директ</div>
                <div class="panel-body">
                    <?= $form->field($model, 'direct_rate')->textInput(['maxlength' => true, 'class' => 'float-digital form-control']) ?>
                    <?= $form->field($model, 'direct_click')->textInput(['class' => 'digital-input form-control']) ?>
                    <?= $form->field($model, 'direct_order')->textInput(['class' => 'digital-input form-control']) ?>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel adwords">
                <div class="panel-heading">AdWords</div>
                <div class="panel-body">
                    <?= $form->field($model, 'adwords_rate')->textInput(['maxlength' => true, 'class' => 'float-digital form-control']) ?>
                    <?= $form->field($model, 'adwords_click')->textInput(['class' => 'digital-input form-control']) ?>
                    <?= $form->field($model, 'adwords_order')->textInput(['class' => 'digital-input form-control']) ?>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Внести данные' : 'Изменить данные', ['class' => ' save btn btn-primary btn btn-lg center-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>