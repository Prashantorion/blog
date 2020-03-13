<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\models\Banner;

use backend\models\ProjectType;

use backend\models\ProjectStatus;

use backend\models\Location;

use backend\models\Project;

use kartik\file\FileInput;

use yii\helpers\ArrayHelper;





 $bannerlist = Banner::find()->where(['is_deleted' => 0])->all();





?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'add','options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

	

<div class="col-md-5 col-sm-8">

<h2>Add New Banner</h2>

<?= $form->field($model, 'banner_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'banner_desc')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'banner_image')->fileInput(['maxlength' => true]) ?>

<!-- <?= $form->field($model, 'banner_small_img')->fileInput(['maxlength' => true]) ?> -->

<?= $form->field($model, 'banner_cat_name')->textInput(['maxlength' => true]) ?>





<div id="banner_url_status" class="hidden-field">
<div class="form-sections">
<?= $form->field($model, 'banner_url')->textInput(['maxlength' => true]) ?>
</div>
<div class="clearfix"></div> 
    </div>



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