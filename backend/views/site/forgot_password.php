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

</script>

<?php if($alert->message != null)
{
    echo "<script language='javascript'>";
echo "alert(alertMessage);";
echo "window.location.replace('http://localhost/backend/web/site/login');";
echo "</script>";
}


?>



<!-- <div class="loginPanel animated fadeInUp"> -->

<?php $form = ActiveForm::begin(['action' => 'forgot_password','options' =>['class' => 'loginForm']]); ?>

<h2>Reset Password<font class="block patchGreyColor small-text3">Use the registered Email Address &amp; hit 'Reset Password'</font></h2>

<input type="text" placeholder="email address" name="Users[user_email]"/ required>

<input type="submit" value="Reset Password" class=""/> 


<!-- </div> -->
<p class="center small-text2 vpad10"> Back To Login <a href="<?= yii::$app->homeUrl ?>/site/login" class="w600">Click Here</a></p>

<?php ActiveForm::end(); ?>






<script>



function init()

{

	if(alertType != '')

	{

	      alert(alertMessage);

	}



}



</script>