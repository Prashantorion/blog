<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;



?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'edit?id='.$model->id, 'options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

	

<div class="col-md-5 col-sm-8">

<h2>Edit Blog</h2>





<?= $form->field($model, 'news_title')->textInput(['maxlength' => true]) ?>



<?= $form->field($model, 'news_image')->fileInput(['maxlength' => true]) ?>
<span class="tips"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Use 1000x500px (2:1) image resolution for best visuals</span>




<?= $form->field($model, 'news_desc')->widget(\yii\redactor\widgets\Redactor::className(),[

        'class' => 'retactorBox',

        'clientOptions' => [

		'plugins' => ['fontsize','fontfamily','fontcolor']



       	],

   ]) 



   ?>



<?= $form->field($model, 'news_date')->textInput(['maxlength' => true,'placeholder' => 'Date', 'class' => 'datefeild','data-toggle'=>"datepicker"]) ?>

    <button type="button" class="btn btn-default datepicker-trigger" rel="tooltip" data-placement="bottom" title="Select Date">

  <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></button>


</div>


<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">

<input type="submit" value="Update" class="" /> 

</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

<div class="clearfix"></div>

</div>

</div>

<div class="clearfix"></div>