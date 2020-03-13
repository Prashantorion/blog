<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;

?>

<div class="container leftSided hpad5">
<div class="col-md-12 col-sm-12">
<?php $form = ActiveForm::begin(['action' =>'add','options' =>['class' => 'forms01 boxType01','enctype' => 'multipart/form-data']]); ?>
	
<div class="col-md-5 col-sm-8">
<h2>Add New Sub-Category</h2>

<?= $form->field($model, 'cat_id')->dropDownList($catList, ['prompt'=>'Select...']) ?>
<?= $form->field($model, 'sub_cat_name')->textInput(['maxlength' => true]) ?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Add" class="" /> 
</div>

<div class="clearfix"></div>
</div>
<?php ActiveForm::end(); ?>


</div>