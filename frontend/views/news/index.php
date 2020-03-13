<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\News;
use yii\web\View;
use yii\bootstrap\Modal;


$newslist = News::find()->where(["is_deleted" => 0,"blog_status" => 0])->all();

$this->registerJs("init();", View::POS_READY, 'page-init');

?>
<!-- Content -->
<!-- ====================================================================================================== -->
<!-- CONTENT-->
<section class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-sec wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <h2>resources</h2>
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li class="active">&nbsp;&nbsp;/ &nbsp;&nbsp;resources</li>
                        </ul>
                    </div>
                </div>
            </section>
          <section class="blog-page">
                <div class="container">
                    <div class="main-heading wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <h1 class="big-heading">latest</h1>
                        <p class="small-heading">resources</p>
                    </div>
                </div>

               

                <div class="container-fluid">
                   <?php
                foreach ($newslist as $blog)
                {
                    $newsdate = UtilFunctions::convertPhpToNormalDate($blog->news_date);
                    $newsdates = UtilFunctions::convertPhpToNormalDate($newsdate);
                ?>
                    <div class="article wow slideInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <div class="text-right">
                            <a href="<?= yii::$app->homeUrl ?>news/news_details?name=<?= $blog->news_title?>" class="article-image">
                                <figure>
                                    <img src="<?= yii::$app->params["backendDomain"] ?>uploads/newsimage/<?= $blog->news_image?>" alt="" />
                                </figure>                          
                            </a>
                        </div>
                        <div class="article-text">
                            
                            <h3><a href="<?= yii::$app->homeUrl ?>news/news_details?name=<?= $blog->news_title?>"><?= $blog->news_title?></a></h3>
                            <p><?= $blog->news_title?></p>
                           
                            <div class="date-article"><span class="name">Orion Labs</span> on <span class="date"><?=  UtilFunctions::convertDateForEvent($blog->news_date) ?></span></div>
                        </div>
                    </div> 
                <?php } ?>

                </div>
            </section>
  <!-- CONTENT END -->
<script>

  function init()
  {
      setMenuActive('news');
  }

function newssearchmonth()
{
    var e = document.getElementById("month");
   var newsmonth = e.options[e.selectedIndex].value; 
   
    

   //alert (newsmonth);
}
  
function newssearchyear()
{
    
   // alert('year');
}

</script>


