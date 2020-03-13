<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use frontend\custom\UtilFunctions;
use yii\helpers\Html;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-init');
 
?>

<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">



<div class="boxType01">
<h2><span>Manage Account</span></h2>
<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['action' =>'update_details','options' =>['class' => 'forms01 form-sections pad15']]); ?>
<h3>My Details</h3>
<input type="text" placeholder="Full Name" value="<?= $user->user_name ?>" name="Users[user_name]" required/>
<input type="email" placeholder="Email Address" value="<?= $user->user_email ?>" name="Users[user_email]" required/>
<input type="text" placeholder="Mobile Number" value="<?= $user->user_mobile ?>" name="Users[user_mobile]" required/>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12">
<input type="submit" value="Update Details" class="" onclick="return confirm('Are you sure you want to update your details ?');"/> 
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>
</div>

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['action' =>'update_password','options' =>['class' => 'forms01 form-sections pad15']]); ?>
<h3>Change Password</h3>
<input type="password" placeholder="Current password" name="Users[old_password]" required/>
<input type="password" placeholder="New password" id="newPassword" name="Users[password]" required/>
<input type="password" placeholder="Retype new password" id="retypePassword" required/>
<div class="col-md-12 col-sm-12">
<input type="submit" value="Update Password" class="" onclick="return validate();"/> 
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<script>

function validate()
{
	if($('#newPassword').val().localeCompare($('#retypePassword').val()) == -1)
	{
		alert('Passwords do not match');
		return false;
	}

	var a = confirm('Are you sure you want too update your password ?');
	if(a == true)
	{
		return true;
	}

	return false;
}
</script>