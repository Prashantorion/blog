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
<div class="content">	

		<!-- JUMBOTRON -->

		<div class="jumbotron container-fluid">

			<div class="jumbotron-overlay"  style="background-image: url('images/blur-close-up-cutlery.png');"></div>

			<h1 class="page-title wow fadeInRight">Your<br>Enquiry</h1>

			<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>

		</div>

		<!-- JUMBOTRON END -->



		<div class="thankYou container-fluid text-center">

			<h1 class="page-title">THANK YOU...</h1>

			<p>We have recieved your enquiry and one of our sales representative will get in touch with you soon.</p>

			<p>In case you want more information, you can always <a href="#">contact us</a></p>

		</div>



</div>

	<!-- CONTENT END -->

	
<script>

	function init()
	{
      setMenuActive('product');

	}

  


</script>
