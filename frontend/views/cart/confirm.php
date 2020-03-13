<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Course;
use yii\web\View;
use backend\models\ProductsImages;
use backend\models\Categories;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>
<!-- JUMBOTRON -->
<!-- ===================================== -->	
<div class="jumbotron">
  	<h2><span>Check</span>out</h2>
	<ol class="breadcrumb">
		  <li><a href="<?= yii::$app->homeUrl ?>index">Home</a></li>
		  <li class="active">Checkout</li>
	</ol>
</div>

<div class="content">
<h1 class="pageTitle">Enquiry <span>Cart</span></h1>
<div class="container-fluid innerpages">
<div class="clearfix"></div>
<div class="contentBox">
<h4>Step 2 - <span>Any additional instructions for us and how to reach you?</span></h4>
<div class="clearfix"></div>
<div class="col-md-5 col-sm-7">
<?php $form = ActiveForm::begin(['action' =>'confirm_inquiry','options' =>['class' => 'forms01 bordered']]); ?>

<?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'placeholder' => 'Full Name (required)']) ?>

<div class="clearfix"></div>

<?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'Email Address (required)']) ?>

<div class="clearfix"></div>

<?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'placeholder' => 'Mobile Number (required)']) ?>

<div class="clearfix"></div>

<?= $form->field($model, 'additional_instructions')->textArea(['maxlength' => true,'placeholder' => 'Additional Instructions (optional)']) ?>

<div class="clearfix"></div>
    
<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">

<div class="g-recaptcha" data-sitekey="6LfaIUwUAAAAANF--cQ4QMMCwVW9H7hv8_RtECnG"></div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Send Enquiry" class="floatleft" />
<div class="clearfix"></div><b></b>
</div>
<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

<div class="clearfix"></div>
	
</div>
<div class="clearfix"></div>

</div>

<div class="clearfix"></div>
    </div>
</div>

<script>

	function init()
	{
      setMenuActive('product');


      $( "#w0" ).on('beforeSubmit', function (e) {

			if($(this).find('.has-error').length) 
		    {
		       return false;
		    }


		    if(grecaptcha.getResponse() == '')
			{

				if($('#w0').find('.has-error').length) 
			    {
			       return;
			    }

				alert('Please complete the CAPTCHA');

				return false;
			}

			return true;

		});


	}

  


</script>
