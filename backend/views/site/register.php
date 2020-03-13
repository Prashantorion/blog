<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use yii\web\View;



?>



<script>



var alertType = "<?php if(isset($alert)){echo $alert->type;} else{echo '';} ?>";

var alertMessage = "<?php if(isset($alert)){echo $alert->message;} else{echo '';} ?>";

var alertBack = "<?php if(isset($alert)){echo $alert->back;} else{echo '';} ?>";



</script>



<!-- <div class="content">

<div class="loginPanel animated fadeInUp"> -->

<?php $form = ActiveForm::begin(['action' => 'register','options' =>['class' => 'loginForm']]); ?>



<h2>Welcome<font class="bigger0 block patchGreyColor">Register With Us</font></h2>

<input type="text" name="Users[user_name]" placeholder="Full Name" required/>

<input type="text" name="Users[user_email]" placeholder="Email Address" required/>

<input type="text" name="Users[user_mobile]" placeholder="Mobile Number" required/>

<input type="submit" value="Register" class=""/> 

<?php ActiveForm::end(); ?>

<div class="loginBottomPanel"><a href="<?= yii::$app->params['defaultDomain'] ?>web/site/login" class="new">Login</a><a href="<?= yii::$app->params['defaultDomain'] ?>web/site/forgot_password">Forgot Password</a><div class="clearfix"></div></div>






<script>



function init()

{

	if(alertType != '')

	{

	      alert(alertMessage);

	      if(alertBack == 'true')

	      {

 			window.history.back();

	      }

	     

	}

}



</script>

