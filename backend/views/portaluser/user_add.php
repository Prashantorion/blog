<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-register');

?>

<div class="container">

<?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'action' =>'user_add','options' =>['class' => 'forms01','enctype' => 'multipart/form-data']]); ?>
	
<div class="col-md-4 col-sm-6">
<h3>Add New User</h3>

<?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'user_mobile')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'user_desc')->textArea(['maxlength' => true]) ?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Add" class="" /> 
</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

</div>


<script>

function init()
{
	
}

</script>