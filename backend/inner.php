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
use yii\web\View;

AppAsset::register($this);
$this->registerJs("initMain();", View::POS_READY, 'my-options');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?= Html::csrfMetaTags() ?>
<!-- Meta Basics -->
<!-- ====================================================================================================== -->
<meta charset="utf-8" />
<title>Kings Developers Dashboard</title>
<meta name="description" content />
<meta name="keywords" content />
<meta name="author" content />
<!-- Mobile Specific Metas -->
<!-- ====================================================================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- Favicons -->
<!-- ====================================================================================================== -->
<link rel="shortcut icon" href="<?= yii::$app->homeUrl ?>images/favicons/favicon.png" />
<link rel="apple-touch-icon" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?= yii::$app->homeUrl ?>images/favicons/apple-touch-icon-114x114.png" />
<!-- Windows Tiles -->
<!-- ====================================================================================================== -->
<meta name="application-name" content="Kings Developers Dashboardr" />
<meta name="msapplication-TileColor" content="#FFF" />
<meta name="msapplication-square70x70logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-tiny.png" />
<meta name="msapplication-square150x150logo" content="<?= yii::$app->homeUrl ?>images/favicons/msapplication-square.png" />
<!-- CSS -->
<!-- ====================================================================================================== -->
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/custom.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?= yii::$app->homeUrl ?>css/redactor.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?= yii::$app->homeUrl ?>date/jquery.datetimepicker.css"/ >


<!-- Fallbacks -->
<!-- ====================================================================================================== -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->

</head>

<body id="" class="scrollLock innerPages">
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
<div class="col-md-12 col-sm-12">
<a href="<?= yii::$app->homeUrl ?>" class="logo"></a> 
    
<div class="profileManagement">
<h2>welcome,<span><?= yii::$app->user->identity->user_name ?></span></h2>
    <a href="<?= yii::$app->homeUrl ?>user/"><i class="fa fa-wrench"></i>Manage Account</a><a href="<?= yii::$app->homeUrl ?>site/logout" data-method="post"><i class="fa fa-sign-out"></i>Logout</a>
</div>
    </div>
    </div>



<div class="clearfix"></div>
<div class="clearfix"></div>

<?php $this->beginBody() ?>

<div class="content">
<div class="container-fluid nopad">
<div id="col-md-12 col-sm-12">
<ul class="menu">
<li class="dropdown"><a href="#"><span>Projects</span></a>

<ul>
    <li><a href="<?= yii::$app->homeUrl ?>project/add"><span>Add</span></a></li>
    <li><a href="<?= yii::$app->homeUrl ?>project/view"><span>View</span></a></li>
</ul>
</li>

<li class="dropdown"><a href="#"><span>Location</span></a>
<ul>
    <li><a href="<?= yii::$app->homeUrl ?>location/add"><span>Add</span></a></li>
    <li><a href="<?= yii::$app->homeUrl ?>location/view"><span>View</span></a></li>
</ul>
</li>

<li class="dropdown"><a href="#"><span>News</span></a>
<ul>
    <li><a href="<?= yii::$app->homeUrl ?>news/add"><span>Add</span></a></li>
    <li><a href="<?= yii::$app->homeUrl ?>news/view"><span>View</span></a></li>
</ul>
</li>

<li class="dropdown"><a href="#"><span>Banners</span></a>
<ul>
    <li><a href="<?= yii::$app->homeUrl ?>banner/add"><span>Add</span></a></li>
    <li><a href="<?= yii::$app->homeUrl ?>banner/view"><span>View</span></a></li>
</ul>
</li>


<!-- <li class="dropdown"><a href="#"><span>Client Speaks</span></a>
<ul>
    <li><a href="<?= yii::$app->homeUrl ?>clientspeaks/add"><span>Add</span></a></li>
    <li><a href="<?= yii::$app->homeUrl ?>clientspeaks/view"><span>View</span></a></li>
</ul>
</li> -->
</ul>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>


<?= $content ?>


</div>



<?php $this->endBody() ?>

<div class="footer">

    <div class="col-md-12 col-sm-12">
    <p class="credits center">nZr Admin <i class="fa fa-copyright" aria-hidden="true"></i> 2018</p>
    </div>
    <div class="clearfix"></div>
</div>
</div>


<script src="<?= yii::$app->homeUrl ?>js/jquery.easing.1.3.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/jquery.slicknav.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/selectize.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/scripts.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/dataTables.buttons.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/jszip.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/pdfmake.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/vfs_fonts.js"></script>
<script src="<?= yii::$app->homeUrl ?>datatable/js/buttons.html5.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/masonry.pkgd.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/imagesloaded.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/classie.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/AnimOnScroll.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/typeahead.bundle.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/typeheadInit.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/datepicker.min.js"></script>
<script src="<?= yii::$app->homeUrl ?>js/curdate.js"></script>

<script>
$(function(){
$('[data-toggle="datepicker"]').datepicker({
trigger: '.datepicker-trigger',
format: 'dd-mm-yyyy'
});

$('[data-toggle="datepicker1"]').datepicker({
trigger: '.datepicker-trigger.alt',
format: 'dd-mm-yyyy'
});

$('[data-toggle="datepicker2"]').datepicker({
trigger: '.datepicker-trigger.alt2',
format: 'dd-mm'
});

$('[data-toggle="datepicker3"]').datepicker({
trigger: '.datepicker-trigger.alt3',
format: 'dd-mm'
});

$('[data-toggle="datepicker4"]').datepicker({
trigger: '.datepicker-trigger.alt4',
format: 'dd-mm'
});

$('[data-toggle="datepicker5"]').datepicker({
trigger: '.datepicker-trigger.alt5',
format: 'dd-mm'
});

});
</script>

        <script>
            new AnimOnScroll( document.getElementById( 'grid' ), {
                minDuration : 0.4,
                maxDuration : 0.7,
                viewportFactor : 0.2
            } );
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

            $.notify({"message":"<?= $message['message'] ?>","icon":"<?= $message['icon'] ?>","title":"<?= $message['title'] ?>","target":"_blank"},{"type":"<?= $message['type'] ?>"});

            <?php endforeach; ?>

            
            $('.table1').DataTable();

            var table = $('.table2').DataTable({
                dom: 'lBfrtip',
                buttons: [ 'excelHtml5', 'pdfHtml5' ]
            } );

        }
            
</script>

</body>
</html>
<?php $this->endPage() ?>
