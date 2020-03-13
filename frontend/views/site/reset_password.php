<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

?>



<div class="contents">

<!-- Banners -->
<div class="innerTitles">
<div class="container">
<div class="col-md-5 col-sm-5">
<h1><span><a href="index.htm" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="index.htm" class="titleLink disabled">Reset Password</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->

<div class="container">

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'action' =>'reset_password_now','options' =>['class' => 'forms01','onsubmit' => 'return onSubmit();']]); ?>
<p><font class="bigger0 top-pad15 block w600 poppinsFont border-width1 border-color10 bottom-divider-dotted lh3">Set your new password</font></p>

<input type="password" name="Users[password]" id="newpassword" placeholder="New Password" tabindex="2" required>
<input type="password" name="retypepassword" id="retypepassword" placeholder="Confirm New Password" tabindex="2" required>

<input type="hidden" name="Users[user_id]" value="<?= $model->user_id ?>" >

<input type="submit" value="Reset Password" class="floatleft"/>
<div class="clearfix"></div>
<div id="form-status"></div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>

</div>
<div class="col-md-6 col-sm-6">
<a href="<?= yii::$app->params['defaultDomain'] ?>web/user/register" class="registerButton"><span>Not a member yet?</span>Click Here</a>
<div class="clearfix"></div>

</div>
<div class="clearfix"></div>


</div>


<div class="clearfix"></div>

</div>






<script>

function onSubmit()
{
	var pass = $('#newpassword').val();
	var passR = $('#retypepassword').val();

	if(pass != passR)
	{
		alert('Passwords are not matching');

		return false;
	}

	return true;

	
}

</script>