<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use yii\web\View;
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

			<h1 class="page-title">Contact<br>Brassline India</h1>

			<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>

		</div>

		<!-- JUMBOTRON END -->



		

		<div class="contact-page-section container-fluid wow fadeInUp">

			<!-- MAP -->

			<div class="map" id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7537.638742562059!2d72.85251790680476!3d19.159382397496376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b7b33cbd9a1b%3A0xf664391ec183dd2d!2sBrass+Line+India!5e0!3m2!1sen!2sin!4v1566567035408!5m2!1sen!2sin"  frameborder="0" style="border:0" allowfullscreen></iframe></div>

			<!-- MAP END -->

			<!-- CONTACT DETAILS -->

			<div class="row no-gutters contact-details-wrapper">

				<div class="col-12 col-md-4 contact-detail">

					<span class="lnr lnr-map-marker"></span>

					<h4>Mumbai Showroom</h4>

					<address>La-Varna Tower, 4th Floor, 290L. T. Road,<br>

							Next to Small Causes Court,<br>

							Opp. St. Xavier High School,<br>

							Mumbai - 400 002

					</address>

					<p class="contact-no">Mr.M. Aslam: <a href="#">+91-9820229075</a></p>

					<p class="contact-no">Mr.M. Waseem: <a href="#">+91-9819000302</a></p>

					<p class="contact-id">Email: <a href="#">brasslineindia@gmail.com</a></p>

					
				</div>



				<div class="col-12 col-md-4 contact-detail">

					<span class="lnr lnr-map-marker"></span>

					<h4>Mumbai Workshop</h4>

					<address>A/16, Sonawala Industerial Estate,<br>

							Sonawala 'X' Road No.2,<br>

							Madan Mohan Silk Mill Compound,<br> 

							Goregaon (E), Mumbai - 400063

					</address>

					<p class="contact-no">Mr.M Javed: <a href="#">+91-9837055902</a></p>

					<p class="contact-id">Email: <a href="#">brasslineindia@gmail.com</a></p>

				

				</div>



				<div class="col-12 col-md-4 contact-detail">

					<span class="lnr lnr-map-marker"></span>

					<h4>Factory & Showroom</h4>

					<address>Himgiri Colony Sonakpur Behind Choudhry Market, <br>

							Kanth Road, Harthla,<br>

							Moradabad - 244001, U.P., India

					</address>

					<p class="contact-no">Mr.M Nadeem: <a href="#">+91-7500676786</a></p>

					<p class="contact-no">Office: <a href="#">+91-0591-2454298</a></p>

					<p class="contact-no">Fax: <a href="#">+91-0591-2454277</a></p>

				</div>

			</div>

		</div>


</div>

	<!-- CONTENT END -->
<script>

	function init()
	{
      setMenuActive('contact');

	}

  


</script>


 
