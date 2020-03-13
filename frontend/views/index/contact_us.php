<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Competency;
use backend\models\University;
use backend\models\Course;
use yii\web\View;
use backend\models\Brand;
use backend\models\Products;
use backend\models\ProductsImages;
use yii\bootstrap\Modal;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="contents">

<div class="container-fluid">
<div class="col-md-6 col-md-push-6 col-sm-6  col-sm-push-6">
<a class="haveQuestions" href="tel://+9102265611175">Have Questions?<span><i class="fa fa-phone" aria-hidden="true"></i>+91.022.65611175</span></a>
<div class="clearfix"></div>
<a href="<?= yii::$app->homeUrl ?>cart/" class="enquiryBaskest"><span id='cart-count'>01</span>Enquiry Basket</a>
<div class="clearfix"></div>

</div>

<div class="col-md-6 col-md-pull-6 col-sm-6  col-sm-pull-6">
<div class="contentBoxLeft">
<h1>Contact Us<span></span></h1>

</div>
</div>

<div class="clearfix"></div>

<div class="col-md-7 col-sm-12">
<div id="map" class="map" ></div>
</div>

<div class="col-md-5 col-sm-12">
<div class="contentBoxRight blackBox">
<h2><span>Office Address</span></h2>
<p>88/90 Trinity Street, Manik Building,<br>2nd Floor, Dhobitalao(Metro),<br>Mumbai, Maharashtra 400002.</p>

<p><a href="https://goo.gl/54L6tE" target="_blank" class="getDirection"><i class="fa fa-map-marker"></i>Get Directions</a></p>
<div class="clearfix"></div>
<p>
<span class="block lh3"><i class="fa fa-mobile contactIcons"></i><a href="tel://+919819000302" class="telLink">+91 9819000302</a></span>
<span class="block lh3"><i class="fa fa-fax contactIcons"></i><a href="tel://+912265611175" class="telLink">+91 22 6561 1175</a></span>
<span class="block lh3"><i class="fa fa-envelope contactIcons"></i><a href="mailto:info@brasslinehirer.com">info@brasslinehirer.com</a></span>
</p>

</div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

</div>

<script>

	function init()
	{
      setMenuActive('contact');

  //     $( "#w0" ).on('beforeSubmit', function (e) {
		// 	if($(this).find('.has-error').length) 
		//     {
		//        return false;
		//     }

		//     if(grecaptcha.getResponse() == '')
		// 	{
		// 		if($('#w0').find('.has-error').length) 
		// 	    {
		// 	       return;
		// 	    }

		// 		alert('Please complete the CAPTCHA');

		// 		return false;
		// 	}

		// 	var a = confirm('Are you sure you want to submit this form ?');	
		// 	if(a)
		// 	{
		// 		return true;
		// 	}
		// 	else
		// 	{
		// 		return false;
		// 	}

		// 	return true;



		// });
	}

  


</script>
