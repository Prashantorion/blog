<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

?>

<div class="container leftSided hpad5">
<div class="col-md-12 col-sm-12">


<div class="clearfix"></div>
<?php $form = ActiveForm::begin(['action' =>'update_details','options' =>['class' => 'forms01 boxType01']]); ?>
	
<div class="col-md-4 col-sm-6">
<h2><span>Manage Account</span></h2>
<h3><span>My Details</span></h3>
<input type="text" placeholder="Full Name" value="<?= $user->user_name ?>" name="Users[user_name]" required/>
<input type="email" placeholder="Email Address" value="<?= $user->user_email ?>" name="Users[user_email]" required/>
<input type="text" placeholder="Mobile Number" value="<?= $user->user_mobile ?>" name="Users[user_mobile]" required/>



<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Update Details" class="" onclick="return confirm('Are you sure you want to update your details ?');"/> 
</div>
    </div>
    
<div class="clearfix"></div>


<?php $form = ActiveForm::begin(['action' =>'update_password','options' =>['class' => 'forms01 boxType01']]); ?>
<div class="col-md-4 col-sm-6">
<h3><span>Change Password</span></h3>
<input type="password" placeholder="Current password" name="Users[old_password]" required/>
<input type="password" placeholder="New password" id="newPassword" name="Users[password]" required/>
<input type="password" placeholder="Retype new password" id="retypePassword" required/>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Update Password" class="" onclick="return validate();"/> 
</div>

<div class="clearfix"></div>


<div class="clearfix"></div>
</div>
</div>
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