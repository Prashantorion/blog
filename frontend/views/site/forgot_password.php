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
<h1><span><a href="<?= yii::$app->params['defaultDomain'] ?>web/index" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="<?= yii::$app->params['defaultDomain'] ?>web/site/forgot_password" class="titleLink disabled">Forgot Password</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->

<div class="container">

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['action' => 'forgot_password','options' =>['class' => 'forms01']]); ?>
<p><font class="bigger0 top-pad15 block w600 poppinsFont border-width1 border-color10 bottom-divider-dotted lh3">Use your registered email</font></p>
<div class="clearfix"></div>
<input type="email" placeholder="Email Address" name="Users[user_email]" required/> 
<div class="clearfix"></div>
<input type="submit" value="Send Instructions" class="floatleft"/>
<div class="clearfix"></div>
<div id="form-status"></div>
<div class="clearfix"></div>
</form>

</div>
<div class="col-md-6 col-sm-6">
<a href="<?= yii::$app->params['defaultDomain'] ?>web/user/register" class="registerButton lessMargin"><span>Not a member yet?</span>Click Here</a>
<div class="clearfix"></div>
</form>

</div>
<div class="clearfix"></div>


</div>


<div class="clearfix"></div>

</div>