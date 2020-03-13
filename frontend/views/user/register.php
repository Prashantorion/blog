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
<h1><span><a href="index.htm" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="index.htm" class="titleLink disabled">New Registration</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->

<div class="container">

<div class="col-md-6 col-sm-6">
<?php $form = ActiveForm::begin(['enableAjaxValidation' => true,'action' =>'register','options' =>['class' => 'forms01']]); ?>
<p>We just need thses details and you will enjoy full access to our awards and contest and also reecive our newletters</p>
<?= $form->field($model, 'user_name')->textInput(['maxlength' => true, 'placeholder' => 'Full Name']) ?>
<?= $form->field($model, 'user_email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
<?= $form->field($model, 'user_mobile')->textInput(['maxlength' => true, 'placeholder' => 'Mobile']) ?>

<input type="submit" value="Register" class="floatleft"/>
<div class="clearfix"></div>
<div id="form-status"></div>
<div class="clearfix"></div>
<?php ActiveForm::end(); ?>

</div>

<div class="clearfix"></div>


</div>


<div class="clearfix"></div>

</div>

<script>

function init()
{
	    
}

</script>