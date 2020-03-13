<?php


/* @var $this \yii\web\View */



/* @var $content string */



use yii\helpers\Html;



use yii\bootstrap\Nav;



use yii\bootstrap\NavBar;



use yii\widgets\Breadcrumbs;



use frontend\assets\AppAsset;



use common\widgets\Alert;



use yii\web\View;







AppAsset::register($this);



$this->registerJs("init();", View::POS_READY, 'my-options');



?>



<?php $this->beginPage() ?>



<!DOCTYPE html>



<html lang="en">



<head>



<!-- Meta Basics -->



<!-- ====================================================================================================== -->



<meta charset="utf-8" />



<title>Orion Labs | Digital Agency in Mumbai Dashboard</title>



<meta name="description" content />



<meta name="keywords" content />



<meta name="author" content />



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



<meta name="application-name" content="Orion Labs | Digital Agency in Mumbai Admin" />



<meta name="msapplication-TileColor" content="#FFF" />



<meta name="msapplication-square70x70logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-tiny.png" />



<meta name="msapplication-square150x150logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-square.png" />



<!-- CSS -->

<meta name="theme-color" content="#00a9b1">

<meta name="msapplication-navbutton-color" content="#00a9b1">

<meta name="apple-mobile-web-app-status-bar-style" content="#00a9b1">    

<!-- ====================================================================================================== -->



<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/custom.css" type="text/css" media="screen" />

<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/redactor.css" type="text/css" media="screen" />





<!-- PACE Loader -->



<!-- ====================================================================================================== -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>





<!-- Fallbacks -->



<!-- ====================================================================================================== -->



<!--[if lt IE 9]>



<script src="js/html5shiv.js"></script>



<![endif]-->



</head>







<body id="" class="scrollLock">



<!-- PreLoader -->



<!-- ====================================================================================================== -->



<div id="preloader">

<div class="spinner">

  <div class="bounce1"></div>

  <div class="bounce2"></div>

  <div class="bounce3"></div>

</div>

</div>







<!-- Screen Tilt Fallback -->

<!-- ====================================================================================================== -->


<div class="tilt-now">



    <h4>Arrgh!<br />



    <small>It seems your screen size is small.<br />



    Hold your device in Portrait Mode to Continue</small><img src="<?= yii::$app->homeUrl ?>images/smart-phone-128.png" class="img-responsive" /></h4>



</div>




<!-- Wrapper -->



<!-- ====================================================================================================== -->



<div class="wrapper">





<!-- Header -->



<!-- ====================================================================================================== -->



<div class="header">



<a href="<?= yii::$app->homeUrl ?>site/login" class="logo"></a>



</div>



<div class="clearfix"></div>







<?php $this->beginBody() ?>






<?= $content ?>



 <div class="clearfix"></div>	

<div class="footer">

  <div class="container-fluid nopad">

  <div class="col-md-12 col-sm-12">

    <p class="credits center">Orion Labs Admin <i class="fa fa-copyright" aria-hidden="true"></i> 2019<br>Licenced to Orion Labs | Digital Agency in Mumbai</p>

  </div>

  <div class="clearfix"></div>

  </div>

  </div>

    </div>



















<?php $this->endBody() ?>





<script src="<?= yii::$app->homeUrl ?>js/jquery.min.js"></script>

    

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>



<script src="<?= yii::$app->homeUrl ?>js/jquery.easing.1.3.js"></script>



<script src="<?= yii::$app->homeUrl ?>js/jquery.slicknav.js"></script>

    

<script src="<?= yii::$app->homeUrl ?>bootstrap/js/bootstrap.min.js"></script>

    

<script src="<?= yii::$app->homeUrl ?>js/SmoothScroll.js.js"></script>

    

<script src="<?= yii::$app->homeUrl ?>js/scripts.js"></script>





</body>



</html>







<script>







function init()



{







    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>







    $.notify({"message":"<?= $message['message'] ?>","icon":"<?= $message['icon'] ?>","title":"<?= $message['title'] ?>","target":"_blank"},{"type":"<?= $message['type'] ?>"});







    <?php endforeach; ?>







}







</script>



<?php $this->endPage() ?>



