<?php

$JS = <<< JS

$(".date-create").on("click",".clear",function(event) {

        $(".modal").find(".errorMessage").css("display", "none");     
         $(".panel-body input").val("");
         
});



    $(".float").keyup(function() {        
        var val=$(this).val();
        $(this).val(val.replace(/,/g, '.'));
    });
    
$(window).keydown(function(event) {
   if (event.which == 13) {
      sendForm()
   }
});
    
    
 $('.date-form').on('submit',function(event) {

    var date = $(".datepicker").val();  
     
      $.ajax({
        type:'get',
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
 	return true;
});
         


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
    <?= Html::csrfMetaTags() ?>
    <?php $form = ActiveForm::begin([
            'id'=>'target-form'

        ]
    ); ?>

    <div class="row">


        <div class="col-lg-4">
            <div class="panel date">
                <div class="panel-heading">Дата</div>
                <br>
                <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['class' => 'form-control datepicker',
                        'style' => "margin-top:50px;",
                        'readonly' => 'readonly'
                    ],
                    'clientOptions' =>[
//                        'changeMonth'=>true,
//                        'changeYear'=>true,
                        'showAnim' => 'fold',
                        'minDate' => '01.09.2016',
                        'maxDate' => date('d.m.Y', strtotime('+1 day')),
                    ],
                    'language' => 'ru',
                    'dateFormat' => 'dd.MM.yyyy',
                    'value'=>date('Y-m-d'),
                ]) ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel direct">
                <div class="panel-heading">Директ</div>
                <div class="panel-body">
                    <?= $form->field($model, 'direct_rate')->textInput(['maxlength' => true, 'class' => 'float  form-control','autocomplete'=> 'off']) ?>
                    <?= $form->field($model, 'direct_click')->textInput(['class' => 'digital-input form-control','autocomplete'=> 'off']) ?>
                    <?= $form->field($model, 'direct_order')->textInput(['class' => 'digital-input form-control','autocomplete'=> 'off']) ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel adwords">
                <div class="panel-heading">AdWords</div>
                <div class="panel-body">
                    <?= $form->field($model, 'adwords_rate')->textInput(['maxlength' => true, 'class' => 'float form-control','autocomplete'=> 'off']) ?>
                    <?= $form->field($model, 'adwords_click')->textInput(['class' => 'digital-input form-control','autocomplete'=> 'off']) ?>
                    <?= $form->field($model, 'adwords_order')->textInput(['class' => 'digital-input form-control','autocomplete'=> 'off']) ?>

                </div>
            </div>
        </div>
    </div>


<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton($model->isNewRecord ? 'Внести данные' : 'Изменить данные', ['class' => ' save btn btn-primary btn btn-lg center-block']) ?>
    <!--    </div>-->

    <?php ActiveForm::end(); ?>


</div>