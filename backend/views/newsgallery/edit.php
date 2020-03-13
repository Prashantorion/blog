<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;

use backend\models\News;

use yii\helpers\ArrayHelper;



 $newslist = News::find()->all();
    $newslist = ArrayHelper::map($newslist,'id','news_title');  


?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'edit?id='.$model->id, 'options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

	

<div class="col-md-5 col-sm-8">

<h2>Edit News Gallery</h2>



<?= $form->field($model, 'news_id')->dropDownList($newslist, ['prompt'=>'Select...']) ?>

<?= $form->field($model, 'news_gallery_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'news_gallery')->fileInput(['maxlength' => true]) ?>
<span class="tips"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Use 600x600px (1:1) image resolution for best visuals. These images will feature in Project Gallery. Upload minimum of 3 for best visuals</span>



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
