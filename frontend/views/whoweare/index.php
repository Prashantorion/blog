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
<section class="page-title" style="background-image:url(images/background/17.jpg)">
		<div class="auto-container">
			<div class="content">
				<h2>Who We Are</h2>
				<div class="text">We are dedicated to offering the most innovative, revolutionary high solutions for both local and foreign investors looking to invest in the vast real estate sector in East Africa.</div>
				<ul class="page-breadcrumb">
					<li><a href="<?= yii::$app->homeUrl ?>index">Home</a></li>
					<li>Who We Are</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End Page Title -->
	
	<!-- About Section -->
	<section class="about-section">
		<div class="pattern-layer" style="background-image:url(images/background/pattern-1.png)"></div>
		<div class="auto-container">
			<!-- Title Box -->
			<div class="title-box">
				<div class="row clearfix">
				
					<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2500ms">
						<div class="image alt">
							<img src="images/resource/about-one.jpg" alt="" />
						</div>
					</div>
					
					</div>
					<div class="offset-lg-1 col-lg-10 offset-md-1 col-md-10 offset-sm-1 col-sm-10">
					<div class="sec-title wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="inner-title">
								<h2>Introduction</h2>
							</div>
						</div>
						<p class="wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">Comfort Homes, Uganda, since its inception has become synonymous with quality development of residential, commercial and affordable properties. 
						With the housing development industry in Uganda continuing to record increased growth from the current demand of quality housing units per year, 
						Comfort Homes, is destined to go beyond providing homes. In a very short span of time, we have risen to be known for our quality construction and development, 
						boosted by our non-compromising use of cutting edge technology, high quality construction materials, skilled professionals, and 
						a passion to open up super property ownership across East Africa.</p>
						<p class="wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2500ms">Our tremendous growth in the East African property industry has been steered by the company's exclusive allegiance to customer-satisfaction. 
						With our current target focusing on the affordable housing market, our value proposition pillars remain firmly founded in ensuring that our homes are the 
						embodiment of sophistication, authenticity and excellence. Subsequently, we are dedicated to offering the most innovative, 
						revolutionary high solutions for both local and foreign investors looking to invest in the vast real estate sector in East Africa.</p>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Video Section -->
	<section class="branded-section-two" style="background-image:url(images/background/14.jpg)">
		<div class="auto-container">
		<a href="https://www.youtube.com/watch?v=q2RhaEN5wJE" class="video-img popup-youtube wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
		<img src="images/video-img.jpg" /></a>

		</div>
	</section>
	
	<!-- About Section Footer -->
	<section class="about-section-three">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Image Column -->
				<div class="image-column col-lg-4 col-md-5 col-sm-6">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/about-img.jpg" alt="" />
						</div>
					</div>
				</div>
				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-7 col-sm-6">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="inner-title">
								<h2>Customer satisfaction<br>comes first</h2>
							</div>
						</div>
						<p>Our attention to detail: from design and planning right through to adding the final touches, 
						we keep your needs in mind, ensuring that our properties meet your luxury, while giving you a sense of freedom, expression and security. 
						Customer comes First: We aspire to satisfy our customers and investors and this attribute drives our company from within. 
						To us, your needs will always come first. Service you can trust: We believe in sincerity and accountability in whatever we do.</p>
						<p>Professional partnerships: We work hand in hand with established and highly qualified Design & Engineering Associates, 
						Property and Finance consultants, ensuring the end result is the best in the Industry. Duration: 
						We endeavor to complete all our projects within the stipulated time Limit. All Our Completed Projects are maintained by professional 
						Management Team and is a reflection of our satisfied customers.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<section class="about-section-three">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Image Column -->
				<div class="image-column col-lg-4 col-md-5 col-sm-6">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2500ms">
						<div class="image">
							<img src="images/resource/quality-img.jpg" alt="" />
						</div>
					</div>
				</div>
				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-7 col-sm-6">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="inner-title">
								<h2>Quality Policy</h2>
							</div>
						</div>
						<p>At Comfort Homes, we aim for only the Top quality in construction and design and these are the hallmark of our every project.</p>
						<ul class="list-style-one">
						<li>From planing of materials, construction skills to customer relations, we seek perfection in all we do.</li>
						<li>Every activity from vendors surveillance, site inspection to project management is diligently monitored.</li>
						<li>We shall comply with all national and international regulations.</li>
						<li>We shall aim to continuously improve our services and processes and meet our annual objectives.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section Footer -->
<script>

	function init()
	{
      setMenuActive('whoweare');

	}

  


</script>


