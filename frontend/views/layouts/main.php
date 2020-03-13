<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\models\Users;
use backend\models\SeoData;
use yii\web\View;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
$this->registerJs("initMain();", View::POS_READY, 'my-options');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?= Html::csrfMetaTags() ?>
<meta charset="utf-8" />
<?php
    $pageSeoData = array();
    if(isset($seoData))
    {
        $pageSeoData = $seoData;
    }
    else
    {
        $seoData = SeoData::find()->where(['page' => 'default'])->one();
        $pageSeoData["page_title"] = $seoData->page_title;
        $pageSeoData["meta_title"] = $seoData->meta_title;
        $pageSeoData["meta_description"] = $seoData->meta_description;
    }
?>
<!--<title><?= $pageSeoData["meta_title"] ?></title>-->
<title>Orion Labs | Digital Agency in Mumbai</title>
<meta name="description" content="At Orion Labs we aim at making digital campaigns stellar by blending in creative designs with the latest technology. Our mission is to provide clean, efficient, sustainable solutions for companies, large or small, to make their presence felt online or offline. We understand that in a competitive arena like the internet, a book is judged by its cover. We believe that a good blend of our creativity with a keen eye for our clients’ needs allow us to deliver nothing short of the best." />
<meta name="keywords" content="orion labs, Orion Labs, Orion, Labs, website, website development, web applications, designing, digital, web developement, web designing, web application, web application development, ui, ux, user interface, user experience, seo, search engine optimization, social media, social media marketing, digital marketing, application development, digital agency, responsive, mobile applications, mobile apps, apps, applications, responsive website development, responsive website design" />
<!-- Canonical -->
<!-- ====================================================================================================== -->
<!-- <link rel="canonical" href="http://www.comfort-homes.com/" /> -->

<!-- Mobile Specific Metas -->
<!-- ====================================================================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Favicons -->
<!-- ====================================================================================================== -->
<!-- <link rel="shortcut icon" href="<?= yii::$app->homeUrl ?>images/favicons/favicon.png" />

<link rel="apple-touch-icon" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon.png" />

<link rel="apple-touch-icon" sizes="72x72" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon-72x72.png" />

<link rel="apple-touch-icon" sizes="114x114" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon-114x114.png" /> -->

<!-- Windows Tiles -->
<!-- ====================================================================================================== -->
<meta name="application-name" content="Orion Labs | Digital Agency in Mumbai" />

<meta name="msapplication-TileColor" content="#fff" />

<meta name="msapplication-square70x70logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-tiny.png" />

<meta name="msapplication-square150x150logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-square.png" />

<!-- Mobile browser Coloring -->
<!-- ====================================================================================================== -->
<!-- <meta name="theme-color" content="#daa520">

<meta name="msapplication-navbutton-color" content="#daa520">

<meta name="apple-mobile-web-app-status-bar-style" content="#daa520"> -->

<!-- CSS -->
<!-- ====================================================================================================== -->
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>fonts/fonts.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/all.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/responsive.css" type="text/css" media="screen" />

<!-- Modernizr -->

<!-- ====================================================================================================== -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">



</head>
<body>
<!-- start preloader -->
<div id="st-preloader">
      <div id="pre-status">
          <div class="preload-placeholder">
            <span>loading...</span>
          </div>
      </div>
  </div>
<!-- end preloader -->
<div class="scrolltotop">
  <span class="mkdf-icon-stack">
      <svg id="mkdf-arrow-1" xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 12.5 27.6" style="height: 25px;" xml:space="preserve">
        <path d="M4.6,25.6V5.8L3.2,7.2c-0.6,0.6-1.5,0.6-2.1,0S0.5,5.7,1.1,5l4-4c0.6-0.6,1.5-0.6,2.1,0l4,4c0.3,0.3,0.4,0.7,0.4,1.1  s-0.1,0.8-0.4,1.1c-0.6,0.6-1.5,0.6-2.1,0L7.7,5.9v19.8c0,0.8-0.7,1.5-1.5,1.5C5.3,27.1,4.6,26.5,4.6,25.6z"/>
      </svg>        
      <svg id="mkdf-arrow-2" xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 12.5 27.6" style="height: 25px;" xml:space="preserve">
        <path d="M4.6,25.6V5.8L3.2,7.2c-0.6,0.6-1.5,0.6-2.1,0S0.5,5.7,1.1,5l4-4c0.6-0.6,1.5-0.6,2.1,0l4,4c0.3,0.3,0.4,0.7,0.4,1.1  s-0.1,0.8-0.4,1.1c-0.6,0.6-1.5,0.6-2.1,0L7.7,5.9v19.8c0,0.8-0.7,1.5-1.5,1.5C5.3,27.1,4.6,26.5,4.6,25.6z"/>
      </svg>                
  </span>
</div>

<!-- Wrapper -->
<!-- ====================================================================================================== -->

    	 <!-- HEADER -->

       <header class="fixing">
  <div class="menu">
    	<a href="<?= yii::$app->homeUrl ?>index" class="logo"><img src="<?= yii::$app->homeUrl ?>images/logo.png" alt="" class="img-responsive"></a>
    	<nav>
      	<ul>
        		<li><a href="<?= yii::$app->homeUrl ?>index" class="menu-link active">Home</a></li>
        		<li><a href="#" class="menu-link">About</a></li>
        		<li><a href="#" class="menu-link">Portfolio</a></li>
            <li><a href="#" class="menu-link">SOS</a></li>
            <li><a href="#" class="menu-link">case studies</a></li>
        		<li><a href="<?= yii::$app->homeUrl ?>blog" class="menu-link">Resources</a></li> 
            <li><a href="#" class="menu-link">careers</a></li>
        		<li><a href="#" class="menu-link">Contact</a></li>
      	</ul>
    	</nav>
      <div class="main-menu-handle">
          <span></span>
          <span></span>
          <span></span>
      </div>
  </div>
  <div class="mobile-menu">
      <ul>
          <li><a href="<?= yii::$app->homeUrl ?>index" class="menu-link active">Home</a></li>
          <li><a href="#" class="menu-link">About</a></li>
          <li><a href="#" class="menu-link">Portfolio</a></li>
          <li><a href="#" class="menu-link">SOS</a></li>
          <li><a href="#" class="menu-link">case studies</a></li>
          <li><a href="<?= yii::$app->homeUrl ?>blog" class="menu-link">Resources</a></li> 
          <li><a href="#" class="menu-link">careers</a></li>
          <li><a href="#" class="menu-link">Contact</a></li>
      </ul>
  </div>
</header>


  

  <!-- HEADER END -->
        
   <!-- PAGE WRAPPER -->

    <div class="wrapper"> 
    
    <?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<div class="clearfix"></div>


<!-- FOOTER -->
<footer class="footer-area"> 
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
				<div class="logo">
					<a href="<?= yii::$app->homeUrl ?>index"><img src="<?= yii::$app->homeUrl ?>images/logo.png" class="img-responsive"></a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-footer">
					<div class="address">
						<h4>contact us</h4>
		                <p>
		                  Ground Floor, Udyog Bhavan,<br>
		                  Walchand Hirachand Marg,<br>
		                  Ballard Estate,<br> 
		                  Mumbai - 400001
		                </p>
					</div>
					<ul class="contact-numbers">
						<li><div><a href="tel:+919820072427">+91 9820072427</a></div></li>
			    		<li><div><a href="tel:+912222611697">+91 22 22611697</a></div></li>
			    		<li><div><a href="mailto:info@orionlabs.in">info@orionlabs.in</a></div></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<h4>follow us</h4>
				<ul class="social-icons">
					<li><div><a href="https://www.facebook.com/orionlabs/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></div></li>
		    		<li><div><a href="https://www.linkedin.com/company/orion-labs/about/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div></li>
		    		<li><div><a href="https://twitter.com/orionlabsin" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></div></li>
		    		<li><div><a href="https://www.instagram.com/orion_labs/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="policy">
		<div class="container">
			<ul>
				<li><a href="disclaimer.php">disclaimer</a></li>
				<li><a href="privacypolicy.php">privacy policy</a></li>
				<li><a href="termsofuse.php">terms of use</a></li>
				<li>
					<div class="copyright">
						<h5 class="text-right">© Orion Labs since 2011 - All Rights Reserved</h5>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>

  </footer>
  <!-- FOOTER END --> 

</div>


  <!-- PAGE WRAPPER END -->

 



<!-- JS -->
<!-- ====================================================================================================== -->

<script src="<?= yii::$app->homeUrl ?>js/jquery.min.js"></script>

<script src="<?= yii::$app->homeUrl ?>js/all.js"></script>

<script src="<?= yii::$app->homeUrl ?>js/custom.js"></script>


  <script>
  
  $('#s').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
    var s = $('#s').val();
    window.location = '<?= yii::$app->homeUrl ?>product/product_details?product='+s;

    }
});
</script>
<script type="text/javascript">
  function onSearchClicked()
  {
    var s = $('#s').val();
    window.location = '<?= yii::$app->homeUrl ?>product/product_details?product='+s;

  }
</script>
<script>
function jsDecimals(e) {
         var evt = (e) ? e : window.event;
            var key = (evt.keyCode) ? evt.keyCode : evt.which;
            if (key != null) {
                key = parseInt(key, 10);
                if ((key < 48 || key > 57) && (key < 96 || key > 105)) {
                    if (!jsIsUserFriendlyChar(key, "Decimals")) {
                        return false;
                    }
                }
                else {
                    if (evt.shiftKey) {
                        return false;
                    }
                }
            }
            return true;
        }
        // Function to check for user friendly keys  
        //------------------------------------------
     function jsIsUserFriendlyChar(val, step) {
            // Backspace, Tab, Enter, Insert, and Delete  
            if (val == 8 || val == 9 || val == 13 || val == 45 || val == 46) {
                return true;
            }
            // Ctrl, Alt, CapsLock, Home, End, and Arrows  
         if ((val > 16 && val < 21) || (val > 34 && val < 41)) {
                return true;
            }
            if (step == "Decimals") {
                if (val == 190 || val == 110) {  //Check dot key code should be allowed
                    return true;
                }
            }
            // The rest  
            return false;
        }
        function commaSeparateNumber(val){
            var mainValue = val.toString().split('.');
            x=mainValue[0].toString();
            var lastThree = x.substring(x.length-3);
            var otherNumbers = x.substring(0,x.length-3);
            if(otherNumbers != '')
                lastThree = ',' + lastThree;
            var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            if(mainValue[1])
                return res+'.'+mainValue[1];
            else
            {
                return res;
            }
        }
        var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
        function initMain()
        {
         <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            $.notify({"message":"<?= $message['message'] ?>","icon":"<?= $message['icon'] ?>","title":"<?= $message['title'] ?>","target":"_blank"},{"type":"<?= $message['type'] ?>","delay":"<?= $message['duration'] ?>"});
            <?php endforeach; ?>
           //  jQuery('.datepicker').datetimepicker({
        //     timepicker: false,
           //     formatDate: 'd/m/Y',
           //     format: 'd/m/Y'
           // });
           // jQuery('.datepicker').keypress(function(key) {
           //     return false;
           // });
            $('body').on('change','input[type="file"]',function(e){
            var f = this.files[0];
            var sizeInMb = f.size/1024;
            var sizeLimit= 1024; // if you want 5 MB
            if (sizeInMb > sizeLimit) {
                alert('Sorry the file exceeds the maximum size of 1 MB!');
                // reset the input (code for all browser)
                $(this).val('');
                jqXHR.abort();
            }
            else {
                // go on
            }
        });
         }
         function setMenuActive(menuName)
         {
          $('.menu').removeClass('current');
            $('.menu-'+menuName).addClass('current');
         }
</script>

<!-- Google Analytics-->
<!-- ====================================================================================================== -->



</body>
</html>
<?php $this->endPage() ?>