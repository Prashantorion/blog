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

<div class="container tabs01">

<?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'action' =>'user_edit?id='.$model->id,'options' =>['class' => 'forms01']]); ?>
	
<div class="col-md-4 col-sm-6">
<h3>Edit User</h3>

<div class="form-group field-users-user_email required has-error">
<label class="control-label" for="users-user_email">Username: <?= $model->user_email ?></label>
</div>

<?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

<p>
<input type="checkbox" id="password-check">Change Password </input>
</p>

<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'user_mobile')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'user_desc')->textArea(['maxlength' => true]) ?>

<?= Html::activeHiddenInput($model, 'change_password') ;?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Update" class="" /> 
</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>



</div>


<script>

function init()
{
	
	//$('#users-password').val("");
	$('#password-check').on("click", function() {

		if($(this).is(':checked'))
		{
			$('.field-users-password input').attr('enableClientValidation' , true);
			$('.field-users-password').show();
			$('#users-change_password').val(1);
		}
		else
		{
			$('.field-users-password input').attr('enableClientValidation' , false);
			$('.field-users-password').hide();
			$('#users-change_password').val(0);
		}
 
    });

    $('.field-users-password').hide();
    //$('.field-users-password input').attr('enableClientValidation' , false);
}

</script>