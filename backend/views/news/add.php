<?php

/* @var $this yii\web\View */


use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\models\News;

use backend\models\ProjectType;

use backend\models\ProjectStatus;

use kartik\file\FileInput;

use kartik\date\DatePicker;

use yii\helpers\ArrayHelper;

 $newslist = News::find()->where(['is_deleted' => 0])->all();


?>


<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'add','options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

<div class="col-md-5 col-sm-8">

<h2>Add Blog</h2>

<?= $form->field($model, 'news_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'news_image')->fileInput(['maxlength' => true]) ?>

<div class="form-sections">
<?= $form->field($model, 'news_desc')->widget(\yii\redactor\widgets\Redactor::className(),[

        'class' => 'retactorBox',

        'clientOptions' => [

		'plugins' => ['fontsize','fontfamily','fontcolor']



       	],

   ]) 


   ?>
   </div>
   
<!--    <?= $form->field($model, 'news_video_status')->checkBox(['class'=>'checkBox trigger', 'data-trigger' => 'news-video-input']) ?>


 <div id="news-video-input" class="hidden-field">
 <div class="form-sections">

 <?= $form->field($model, 'news_video')->textInput(['maxlength' => true])?>
 </div>
<div class="clearfix"></div>
    </div> -->



<input name="News[news_date]" type="text" placeholder="Date"  class="datefeild" data-toggle="datepicker" />

    <button type="button" class="btn btn-default datepicker-trigger" rel="tooltip" data-placement="bottom" title="Select Date">

  <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></button>



</div>



<div class="clearfix"></div>



<div class="col-md-12 col-sm-12">

<input type="submit" value="Add" class="" /> 

</div>

   

<div class="clearfix"></div>

</div>

 </div>
<div class="clearfix"></div>

<?php ActiveForm::end(); ?>