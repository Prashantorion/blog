<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\models\NewsGallery;

use backend\models\News;

use backend\models\ProjectType;

use backend\models\ProjectStatus;

use backend\models\Location;

use backend\models\Project;

use kartik\file\FileInput;

use yii\helpers\ArrayHelper;


 $newsgallerylist = NewsGallery::find()->where(['is_deleted' => 0])->all();

    $newslist = News::find()->all();

    $newslist = ArrayHelper::map($newslist,'id','news_title');    

?>


<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'add','options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

<div class="col-md-5 col-sm-8">

<h2>Add Blog Gallery Image</h2>

<?= $form->field($model, 'news_id')->dropDownList($newslist, ['prompt'=>'Select...']) ?>

<?= $form->field($model, 'news_gallery_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'news_gallery')->fileInput(['maxlength' => true]) ?>

<span class="tips"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Use 600x600px (1:1) image resolution for best visuals. These images will feature in Blog Gallery</span>

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