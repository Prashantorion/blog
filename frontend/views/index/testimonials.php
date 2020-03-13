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
<h1>Testimonials<span></span></h1>

</div>
</div>

<div class="clearfix"></div>

<div class="block top-pad20 bot-pad20">

</div>

<div class="clearfix"></div>

<div class="col-md-offset-1 col-md-7 col-sm-offset-1  col-sm-7">
<div class="contentBoxLeft blackBox smallPad">
<p>We are pleased to note our satisfaction with the standard of service, offered to us by qualified & efficient team of "Brass Line".
This is the company with high integrity & strong traditional, values focusing on providing the utmost level of customer satisfaction.
Also we would like to commend, that the vision of "Brass Line" is to establish long term client-focused relationship where honesty, enthusiasm & integrity are paramount.</p>
<p>We believe in open honest relationships with "Brass Line" & looking forward for our further cooperation.
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Mavjibhai<small class="block openSansFont small-text2">Kutchhi Caterers</small></font>
</p>
</div>
</div>

<div class="clearfix"></div>

<div class="col-md-offset-4 col-md-7 col-sm-offset-4 col-sm-7">
<div class="contentBoxRight blackBox smallPad">
<p>Happy to be with Brassline, meaning of Brassline itself is quality....best wishes.
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Sushil<small class="block openSansFont small-text2">Gorav Caterers</small></font>
</p>
</div>
</div>

<div class="clearfix"></div>

<div class="col-md-offset-1 col-md-7 col-sm-offset-1  col-sm-7">
<div class="contentBoxLeft blackBox smallPad">

<p>One solution for all our requirements.......
<br>BRASSLINE.
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Yogesh<small class="block openSansFont small-text2">Surabhi Caterers - Hyderabad. </small></font>
</p>
</div>
</div>

<div class="clearfix"></div>

<div class="col-md-offset-4 col-md-7 col-sm-offset-4 col-sm-7">
<div class="contentBoxRight blackBox smallPad">
<p>Wishing U All the Best for Stepping One more Mile Stone to Your Sucess.
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Sanjay<small class="block openSansFont small-text2">Suvidha Caterers</small></font>
</p>
</div>
</div>

<div class="clearfix"></div>

<div class="col-md-offset-1 col-md-7 col-sm-offset-1  col-sm-7">
<div class="contentBoxLeft blackBox smallPad">

<p>Brasslinehirer is the one stop shop where all your requirements are taken care of. You need not go places hunting for the stuff u need. The staff and owners are so well equipped to meet any type of demand and always ready to help u .
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Gurcharan<small class="block openSansFont small-text2">Mini Punjab Lake View - Powai </small></font>
</div>
</div>

<div class="clearfix"></div>

<div class="col-md-offset-4 col-md-7 col-sm-offset-4 col-sm-7">
<div class="contentBoxRight blackBox smallPad">
<p>Brassline- one stop destination to a complete fulfillment of your catering need. Top of the glittering silver, sparkling brassiere & impeccable service. True pros at therefore always dependable. 
<font class="block PoiretOneFont bigger0 lh2 top-pad10 w600 right">Mr. Anthony Fernandes<small class="block openSansFont small-text2">Operations Manager<br>Aqaba, Peninsula Business Park - Lower Parel</small></font>
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
      setMenuActive('testimonial');

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
