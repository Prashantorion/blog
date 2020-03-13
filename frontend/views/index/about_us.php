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
<h1>About us<span></span></h1>

</div>
</div>

<div class="clearfix"></div>

<div class="col-md-5 col-sm-12">
<div class="contentBoxLeft">
<div class="imgBox cycle-slideshow" data-cycle-timeout="3000" data-cycle-fx="tileSlide">
<img src="<?= yii::$app->homeUrl ?>images/aboutImg.jpg"  class="img1" />
<img src="<?= yii::$app->homeUrl ?>images/aboutImg1.jpg" class="img1" />
<img src="<?= yii::$app->homeUrl ?>images/aboutImg2.jpg" class="img1" />
</div>

</div>
</div>

<div class="col-md-7 col-sm-12">
<div class="contentBoxRight blackBox">
<p><font class="w600 bigger0">BRASS LINE HIRER</font> is the only Supplier which provides Premium Quality products on rental basis. As we understand your requirements for your special events, 
we provide products like E.P.N.S Buffet Plate Set, Desert Plate, E.P.N.S Food Warmer, E.P.N.S Platters, E.P.N.S Ice Cream Cup, E.P.N.S Cutleries, Steel Cutleries, 
Brass Copper Food Warmer, Steel Chafing Dish, Melamine Dinner Plate Set, Melamine Desert Plate, Bone China Plate, Bone China Cup Saucer, Bone China Soup Set, Desert Plate, 
Glass Desert Bowl, Silver Marwari & VIP Thali Sitting Set, Silver Jug & Glass Set and Ocean Glasses.</p>
<p>Our main focus is to keep our clients happy by serving them with the best. We always try to offer high quality products at competitive prices. Our clients always appraise us 
for our positive attitude towards service and high end products. We are also known as <font class="w600 bigger0">"UNIQUE QUALITY PRODUCT SUPPLIERS"</font> in our industry.</p>
<p>Our products are supplied all over Mumbai (India). Some of our esteem clients are The Taj Mahal Palace (Mumbai), Intercontinental Marine Drive, JW Marriot Hotels & Resorts, Trident Hotels, 
Intercontinental Hotels & Resorts, Palladium Hotel, Hyatt Regency, ITC Grand Central, Sahara Star, Sofitel Luxury Hotels, The Leela, ITC Hotel, Shangri-la, Hotel Marine Plaza, & many other upcoming 
leading hotels & restaurants.</p>
</div>
</div>


<div class="clearfix"></div>
</div>
<div class="clearfix"></div>

</div>

<script>

	function init()
	{
      setMenuActive('about');
	}

  


</script>
