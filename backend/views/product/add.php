<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Products;
use backend\models\Productcolor;
use backend\models\ProductsImages;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;

//$colModel = new Productcolor();
?>

<div class="container leftSided hpad5">
<div class="col-md-12 col-sm-12">
<?php $form = ActiveForm::begin(['action' =>'add','options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>
	
<div class="col-md-5 col-sm-8">
<h2>Add New Product</h2>

<?= $form->field($model, 'cat_id')->dropDownList($catList, ['prompt'=>'Select...']) ?>

<?= $form->field($model, 'prod_name')->textInput(['maxlength' => true])              ?>

<?= $form->field($model, 'prod_desc')->widget(\yii\redactor\widgets\Redactor::className(),[
        'class' => 'retactorBox',
        'clientOptions' => [
		'plugins' => ['fontsize','fontfamily','fontcolor']

       	],
   ]) 

   ?>

<div class="form-sections">
<?= $form->field($model, 'prod_display_image')->fileInput(['maxlength' => true]) ?>
</div>
   
<div class="form-sections">
<?= $form->field($model, 'main_image[]')->fileInput(['multiple' => true]) ?>
</div>

<?= $form->field($model, 'order_id')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>



<?= $form->field($model, 'url_name')->textInput(['maxlength' => true]) ?>
</div>



<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Add" class="" /> 
</div>
   
<div class="clearfix"></div>
</div>
 </div>

<?php ActiveForm::end(); ?>
 
 <div class="clearfix"></div>


 