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



<!-- Content -->
<!-- ====================================================================================================== -->
<!-- CONTENT-->
<div class="content">

		<!-- JUMBOTRON -->

		<div class="jumbotron container-fluid">

			<div class="jumbotron-overlay"  style="background-image: url('<?= yii::$app->homeUrl ?>images/blur-close-up-cutlery.png');"></div>

			<h1 class="page-title">About<br>Brassline India</h1>

			<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>

		</div>

		<!-- JUMBOTRON END -->



		<div class="about-page-section innerPage-section container text-center">

			<h6 class="page-title wow fadeInUp">WELCOME TO BRASS LINE</h6>

			<h3 class="page-title wow fadeInUp" data-wow-delay=".3s">For more then 20 years, we have been synthesizeing Hospitality Industry items.</h3>

			<div class="row">

				<div class="col-md-4">

				<img src="<?= yii::$app->homeUrl ?>images/banquet-catering.jpg" class="img-fluid">

				</div>



				<div class="col-md-8">

					<div class="about-desc wow fadeInRight">	

					<p>We are leading synthesizeing company which is known for its versitality in production of item for Hospitality industry since last two decades. We shape cutrlery, chafing, dishes, table wares, bathroom sets, room amenities & project customizes. The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material like stainles steel, Silver plated, goldplated, brass, copper other material & there of combo.</p>

					<p>Our company have corporate office in Moradabad & branch office in Mumbai. its aim of establishment is to produce high grade quality product for hotel industry. We feel proud to share that our esteemed client are The Oberoi group of hotels, the taj group of hotel, The Leela, JW Merriot & many other, Upcoming chain of leading hotels and restaurants we are quit straigt forward to our aim as core of our existence and rise up is our customer satisfaction. We give equal importance to each step we take while it matter of chossing the best quality raw product to precision manufacturing by some of the most experienced and skilled professional. To rigorous quality and performance test, utmost attention is given	to each and every aspect while products creation.</p>

					</div>

				</div>

			</div>

		</div>

</div>

	<!-- CONTENT END -->

<script>



	function init()

	{

      setMenuActive('aboutus');

	}



  





</script>

