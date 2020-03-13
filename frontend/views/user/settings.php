<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use budyaga\cropper\Widget;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="contents">

<!-- Banners -->
<div class="innerTitles">
<div class="container">
<div class="col-md-5 col-sm-5">
<h1><span><a href="index.htm" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="index.htm" class="titleLink disabled">Account Settings</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->

<div class="container">

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['action' =>'settings','options' =>['class' => 'forms01','onsubmit' => 'return validate();']]); ?>
<p><font class="bigger0 top-pad20 block w600">Reset your password here</font></p>
<div class="clearfix"></div>
<input name="Users[old_password]" type="password" placeholder="Old Password" required/> 
<div class="clearfix"></div>
<input id="newPassword" name="Users[password]" type="password" placeholder="New Password" required/> 
<div class="clearfix"></div>
<input id="retypePassword" type="password" placeholder="Confirm New Password" required/> 
<div class="clearfix"></div>
<input type="submit" value="Update Password" class="floatleft" />
<div class="clearfix"></div>
<div id="form-status"></div>
<div class="clearfix"></div>
</form>

</div>
<div class="clearfix"></div>


</div>


<div class="clearfix"></div>

</div>

<script>

function init()
{
	    
}

function validate()
{	
	//alert($('#newPassword').val().localeCompare($('#retypePassword').val()));

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