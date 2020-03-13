<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Categories;
use backend\models\Banner;
use backend\models\News;
use yii\web\View;
use yii\bootstrap\Modal;
use yii\db\Expression;


 


$bannerlist = Banner::find()->where(["is_deleted" => 0])->all();

$categorylist = Categories::find()->where(["is_deleted" => 0])->orderBy(new Expression('rand()'))->limit(5)->all();


$newslist = News::find()->where(["is_deleted" => 0])->orderBy(new Expression('rand()'))->limit(3)->all();
 

$this->registerJs("init();", View::POS_READY, 'page-init');

?>
<!-- Content -->
<!-- ====================================================================================================== -->
	<!-- CONTENT-->
<div class="content">

	<!-- LANDING CAROUSEL -->
	<section class="home-banner">
                <div class="home-slider owl-carousel">
                    <div class="container">
                        <div class="item">
                            <div class="home-banner-section">
                                <h3 class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">Welcome to</h3>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
                                        <div class="project">
                                            <div class="project__card">
                                                <a href="" class="project__image"><img src="<?= yii::$app->homeUrl ?>images/banner-logo.png"  class="img-responsive wow fadeIn" data-wow-duration="0.5s" data-wow-delay="4s"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                                        <div class="logo-words">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <h2 class="wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="1s">o</h2>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                    <p class="wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="1s">-&nbsp;&nbsp;Original</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <h2 class="wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="1.5s">r</h2>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                    <p class="wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="1.5s">-&nbsp;&nbsp;Resourceful</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <h2 class="wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="2s">i</h2>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                    <p class="wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="2s">-&nbsp;&nbsp;Innovative</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <h2 class="wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="2.5s">o</h2>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                    <p class="wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="2.5s">-&nbsp;&nbsp;Opportunity</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                    <h2 class="wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="3s">n</h2>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                                    <p class="wow fadeInLeft" data-wow-duration="0.3s" data-wow-delay="3s">-&nbsp;&nbsp;Niche</p>
                                                </div>
                                            </div>
                                            <h4 class="wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="3.5s">labs</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#about" class="down-icon page-scroll wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="4.1s">
                    <i class="fa fa-angle-double-down arrow bounce" aria-hidden="true"></i>
                </a>
            </section>
            <!-- End Bnner Section -->

	<!-- LANDING CAROUSEL END -->



	<!-- ABOUT SECTION -->

	<section class="we-section" id="about">
                <div class="container">
                    <div class="main-heading wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <h1 class="big-heading">About us</h1>
                        <p class="small-heading">we</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="round round1">
                                <img src="<?= yii::$app->homeUrl ?>images/design.png" class="img-responsive">
                                <p>Design</p>
                            </div>
                            <p class="round-text">We design innovative, interactive and intelligent user experiences that allow our clients to meet their specific business needs.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="round round2">
                                <img src="<?= yii::$app->homeUrl ?>images/develop.png" class="img-responsive">
                                <p>develop</p>
                            </div>
                            <p class="round-text">We develop software that speeds up and strengthens the overall efficiency of your business processes and helps you achieve your goals.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
                            <div class="round">
                                <img src="<?= yii::$app->homeUrl ?>images/digital.png" class="img-responsive">
                                <p>digital</p>
                            </div>
                            <p class="round-text">We provide you with digital awareness and equip you with tried and tested solutions that help you make your digital presence felt.</p>
                        </div>
                    </div>
                    <p style="text-align: center;font-weight: 600;margin-top: 20px;" class="wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">We undertake all these services and much more in our commitment oriented philosophy to help you achieve the required standards in a highly competitive and constantly evolving world.</p>
                    <div class="text-center comnBtn wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.5s"><a href="about.php" class="btn thb-text-style"><span>read more</span></a></div>
                </div>
            </section>

	<!-- ABOUT SECTION END -->





	<!-- COLLECTION SECTION -->

	<section class="portfolio-section">
                <div class="container">
                    <div class="main-heading wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.7s">
                        <h1 class="big-heading">portfolio</h1>
                        <p class="small-heading">our projects</p>
                    </div>
                </div>
                <div class="portfolio-items">
                    <div class="row smallgap grid">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/cinthol-logo.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="http://lime.cinthol.com/en/index.html#wakeupalive" target="_blank">Cinthol</a></h4>
                                    <a href="http://lime.cinthol.com/en/index.html#wakeupalive" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/monk.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="http://monkmedianetwork.com/" target="_blank">Monk</a></h4>
                                    <a href="http://monkmedianetwork.com/" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/easternwinds.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="http://www.easternwinds.in/" target="_blank">easternwinds</a></h4>
                                    <a href="http://www.easternwinds.in/" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/shree-krishna-logo.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="http://www.shreekrishnagroup.co.in/" target="_blank">shreekrishna group</a></h4>
                                    <a href="http://www.shreekrishnagroup.co.in/" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/m-power-logo.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="https://www.mpowerminds.com/" target="_blank">mpowerminds</a></h4>
                                    <a href="https://www.mpowerminds.com/" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 grid-item mb30 wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s">
                            <div class="ace_singlePotPortfolio">
                                <div class="port-thumbP"><img src="images/clients-banner/narayan-logo.jpg" alt="" class="img-responsive"></div>
                                <div class="port-hoverP d-flex flex-column align-baseline">
                                    <h4><a href="http://narnarayanmandir.com/" target="_blank">narnarayan mandir</a></h4>
                                    <a href="http://narnarayanmandir.com/" class="img-popup p-light" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center comnBtn wow zoomIn" data-wow-duration="0.5s" data-wow-delay="0.7s"><a href="portfolio.php" class="btn thb-text-style"><span>view more</span></a></div>
            </section>

	<!-- COLLECTION SECTION END -->





	<!-- NEW SECTION -->

	<section class="clients-section">
                <div class="container">
                    <div class="main-heading wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="1.2s">
                        <h1 class="big-heading">our clients</h1>
                        <p class="small-heading">who they are</p>
                        <p></p>
                    </div>
                    <div class="sponsors-carousel owl-carousel wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.2s">
                        <div class="item"><figure class="image-box"><img src="images/clients/cinthol-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/monk.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/easterwinds.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/shree-krishna-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/power-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/narayan-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/instabuild.jpg" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/happy-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/avneetkohli_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/blue-turtle-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/cafe_cuba_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/ClickRent_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/diu-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/Neumec_Group_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/logo_nova.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/omkar-logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/parakram_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/skard_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/toabh_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/urzza_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/verderimilano_logo.png" alt=""></figure></div>
                        <div class="item"><figure class="image-box"><img src="images/clients/pacificstar.png" alt=""></figure></div>
                    </div>
                </div>
            </section>

	<!-- BLOG SECTION END -->

</div>

	<!-- CONTENT END -->
<script>

	function init()
	{
      setMenuActive('home');
	}
</script>
<!--  <script>
            $(function(){
       $(".carousel-inner").find(".item").first().addClass("active");
      });

  </script>
  
  <script>
            $(function(){
       $(".carousel-indicators").find(".thumb").first().addClass("active");
      });

  </script> -->
 
