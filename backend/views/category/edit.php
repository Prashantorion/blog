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
<h2>Edit Category</h2>

<?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

<div class="form-sections">

<?= $form->field($model, 'cat_desc')->widget(\yii\redactor\widgets\Redactor::className(),[
        'class' => 'retactorBox',
        'clientOptions' => [
		'plugins' => ['fontsize','fontfamily','fontcolor']

       	],
   ]) 

   ?>
    </div>

<div class="clearfix"></div>

<?= $form->field($model, 'cat_image',['enableClientValidation' => false])->fileInput(['maxlength' => true]) ?>

<!-- <?= $form->field($model, 'cat_icon',['enableClientValidation' => false])->fileInput(['maxlength' => true]) ?> -->


<div class="clearfix"></div>

<?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'url_name')->textInput(['maxlength' => true]) ?>


<?= Html::activeHiddenInput($model, 'id') ;?>
<?= Html::activeHiddenInput($model, 'added_by') ;?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Update" class="" /> 
</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

</div>