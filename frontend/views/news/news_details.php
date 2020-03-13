<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;

use backend\models\News;

use yii\web\View;

use backend\models\ProductsImages;

use yii\db\Expression;



 $newslists = News::find()->where(["is_deleted" => 0])->orderBy(new Expression('rand()'))->limit(1)->one();

 $newsrelated = News::find()->where(["is_deleted" => 0])->orderBy(new Expression('rand()'))->limit(3)->all();
 
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
        	<section class="blog-detail-page">
                <div class="container">
                <?php

foreach($newsrelated as $blogsrelated)
{	?>
                    <div class="blog image">
                        <figure>
                            <img src="<?= yii::$app->params["backendDomain"] ?>uploads/newsimage/<?= $blogsrelated->news_image?>" class="img-responsive wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        </figure>
                    </div>
                    <h3 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?= $blogsrelated->news_title?></h3>
                    <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?= $blogsrelated->news_desc?></p>
                    
<?php } ?>
                </div>
            </section>

	<!-- CONTENT END -->

<script>
	function init()
	{
      setMenuActive('product');
	}
</script>

