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

//$productList = Products::find()->where(["is_deleted" => 0])->all();
 

$this->registerJs("init();", View::POS_READY, 'page-init');

?>
<!-- Content -->
<!-- ====================================================================================================== -->
<div class="content">

		<!-- JUMBOTRON -->

		<div class="jumbotron container-fluid">

			<div class="jumbotron-overlay"  style="background-image: url('images/blur-close-up-cutlery.png');"></div>

			<h1 class="page-title wow fadeInRight">No<br>Produt Found</h1>

			<!--<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>-->

		</div>

		<!-- JUMBOTRON END -->

		

		<!-- COLLECTION LINKS -->
		<div class="collections-wrapper container text-center wow fadeInLeft">
			
			    	
							
						
							

							<h2><span>We are Sorry</span></h2>
							<h3>No product matching your search</h3>
						
						

						
				
					</div>


		<!-- COLLECTION LINKS -->

		
</div>

    <!-- CONTENT END -->
<script>

	function init()
	{
      setMenuActive('product');
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
 
