<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contents">

<!-- Banners -->
<div class="innerTitles">
<div class="container">
<div class="col-md-5 col-sm-5">
<h1><span><a href="index.htm" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="index.htm" class="titleLink disabled">Login Required</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->

<div class="container">

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['id' => 'login-password-form','action' => 'login','options' =>['class' => 'forms01']]); ?>
<p><font class="bigger0 top-pad15 block w600 poppinsFont border-width1 border-color10 bottom-divider-dotted lh3">Please Login</font></p>

<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
<?= $form->field($model, 'password')->textInput(['maxlength' => true, 'placeholder' => 'Password', 'type' => 'password']) ?>

<input type="submit" value="Login" class="floatleft"/>
<a class="resetPasswordLink" href="<?= yii::$app->params['defaultDomain'] ?>web/site/forgot_password">Forgot Password</a>
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
