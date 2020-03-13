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
<h1>Our Clients<span></span></h1>

</div>
</div>

<div class="clearfix"></div>

<div class="block top-pad20 bot-pad20">

</div>

<div class="clearfix"></div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/grand-hyatt.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/hyatt-regency.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/intercontinental-hotel-resorts.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/itc-grand-central.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/itc-grand-maratha.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/jw-marriott.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/marine-plaza.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/palladium-hotel.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/sahara-star.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/shangari-la.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/sofitel.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/taj-lands-end.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/taj-mahal-palace.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4 clientBox">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/the-leela.jpg">

</div>
</div>

<div class="col-md-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/tirdent.jpg">

</div>
</div>

<div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4">
<div class="clientImg">
<img src="<?= yii::$app->homeUrl ?>images/clientile/hotel/vivanta.jpg">

</div>
</div>

<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

</div>


<script>

	function init()
	{
      setMenuActive('client');

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
