<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Categories;
use backend\models\Banner;
use backend\models\Products;
use backend\models\News;
use yii\web\View;
use yii\bootstrap\Modal;
use yii\db\Expression;


//$categorylist = Categories::find()->where(["is_deleted" => 0])->all();


$newslist = News::find()->where(["is_deleted" => 0])->orderBy(new Expression('rand()'))->limit(3)->all();

//$productList = Products::find()->where(["is_deleted" => 0])->all();
 

$this->registerJs("init();", View::POS_READY, 'page-init');

?>
<!-- Content -->
<!-- ====================================================================================================== -->
<!-- CONTENT-->
<div class="content">

        <!-- JUMBOTRON -->

        <div class="jumbotron container-fluid">

            <div class="jumbotron-overlay"  style="background-image: url('<?= yii::$app->homeUrl ?>images/blur-close-up-cutlery.png');"></div>
<?php

 

foreach($categoryList as $category)

{ }?>
            <h1 class="page-title wow fadeInRight"><?= $category->cat_name ?><br>Collections</h1>

            <p class="wow fadeInRight title-p" data-wow-delay="1000ms"><?= $category->cat_desc ?></p>
            <nav aria-label="breadcrumb">
			  	<ol class="breadcrumb">
    				<li class="breadcrumb-item"><a href="<?= yii::$app->homeUrl ?>index">Home</a></li>
    				<li class="breadcrumb-item"><a href="<?= yii::$app->homeUrl ?>product/index">Our Collection</a></li>
			    	<li class="breadcrumb-item active" aria-current="page"><?= $category->cat_name ?> Collections</li>
			  	</ol>
			</nav>

        </div>

        <!-- JUMBOTRON END -->

        <div>

        </div>

        

        



        <!-- PRODUCT GRID -->

        <div class="products-wrapper container-fluid">

            <div class="row no-gutters text-center products-grid" >

                <?php
foreach($productList as $product)
{ ?>

                <div class="col-xl-3 col-md-4 col-6 product-card  wow fadeInUp" data-wow-duration="1500ms">

                    <img src="<?= yii::$app->params["backendDomain"] ?>uploads/displayimage/<?= $product->prod_display_image?>" class="img-fluid">

                    <h4><?= $product->prod_name ?></h4>
                    <?php 
                    foreach ($categoryList as $categorylist) {
                        
                     ?>

                    <h6><?= $categorylist->cat_name ?></h6>

                    <?php } ?>

                    <a href="<?= yii::$app->homeUrl ?>product/product_details?product=<?= $product->search_name ?>" class="product-link"></a>

                </div>
            <?php } ?>



            </div>

        </div>

        <!-- PRODUCT GRID  END-->
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
 
