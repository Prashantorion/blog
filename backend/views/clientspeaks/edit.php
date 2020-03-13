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
<h3>Edit Category</h3>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
   
<?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

  


</div>


<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Update" class="" /> 
</div>

<div class="clearfix"></div>
</div>
<?php ActiveForm::end(); ?>

</div>