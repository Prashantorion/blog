<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use yii\web\View;



$this->registerJs("init();", View::POS_READY, 'my-options');



?>



<script>

var alertType = "<?php if(isset($alert)){echo $alert->type;} else{echo '';} ?>";

var alertMessage = "<?php if(isset($alert)){echo $alert->message;} else{echo '';} ?>";

var alertUrl = "<?php if(isset($alert)){echo $alert->url;} else{echo '';} ?>";



</script>





<?php $form = ActiveForm::begin(['action' => 'reset_password_now','options' =>['class' => 'loginForm','onsubmit' => 'return onSubmit();']]); ?>

<h2>Reset Password<font class="block patchGreyColor small-text3">Type in your new password</font></h2>



<input type="password" name="Users[password]" id="newpassword" placeholder="New Password" tabindex="2" required>

<input type="password" name="retypepassword" id="retypepassword" placeholder="Confirm New Password" tabindex="2" required>

<!--<input type="submit" id="talysubmit" value="Change Password"  tabindex="3" >-->

<input type="hidden" name="Users[user_id]" value="<?= $model->user_id ?>" >

<input type="submit" class="btn btn-primary" value="Reset Password" class="floatleft"/>

<?php ActiveForm::end(); ?>






<script>



function init()

{

	if(alertType != '')

	{

	      alert(alertMessage);



	      if(alertUrl != '')

	      {

	      	//alert(alertUrl);

 			window.location = alertUrl;

	      }

	}



}



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