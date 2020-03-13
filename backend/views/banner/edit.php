<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;

use backend\models\Project;

use yii\helpers\ArrayHelper;


?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<?php $form = ActiveForm::begin(['action' =>'edit?id='.$model->id, 'options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>

	

<div class="col-md-5 col-sm-8">

<h2>Edit Banner</h2>



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

<input type="submit" value="Update" class="" /> 

</div>
<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

<div class="clearfix"></div>

</div>

</div>
<div class="clearfix"></div>
