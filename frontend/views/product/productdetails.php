<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;

use backend\models\Course;

use yii\web\View;

use backend\models\ProductsImages;

use backend\models\Qty;

use backend\models\Products;

use backend\models\Categories;

use yii\db\Expression;



$this->registerJs("init();", View::POS_READY, 'page-init');



?>


<!-- CONTENT-->
<div class="content">

		<!-- JUMBOTRON -->

		<div class="jumbotron container-fluid">

			<div class="jumbotron-overlay"  style="background-image: url('<?= yii::$app->homeUrl ?>images/blur-close-up-cutlery.png');"></div>

			<h1 class="page-title">Our<br>Collection</h1>

			<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>

		</div>

		<!-- JUMBOTRON END -->



		<!-- PRODUCT DETAILS -->

		<div class="product-detail-section container-fluid">

			<div class="productCarousel">
				
				<div class="bigThumbs">
					<?php
foreach($prod_Image as $prod_Imag)
{ 
?>
					<a class="product-img" href="<?= yii::$app->params["backendDomain"] ?>uploads/products/<?= $prod_Imag->prod_image?>">
						<img src="<?= yii::$app->params["backendDomain"] ?>uploads/products/<?= $prod_Imag->prod_image?>" class="img-fluid">
					</a>
					
					<?php } ?>

					
				</div>
			
				<div class="smallThumbs">
					<?php
foreach($prod_Image as $prod_Image)
{ 
?>

					<div class="small-img" data-thumb="images/BDS-67.png">
						<img src="<?= yii::$app->params["backendDomain"] ?>uploads/products/<?= $prod_Image->prod_image?>" class="img-fluid">
					</div>
					
					
					
				<?php } ?>
				</div>
			</div>



			<div class="container product-descBox">

				<h6 class="page-title"><?= $catModel->cat_name ?></h6>	

				<h3 class="page-title"><?= $productModel->prod_name ?></h3>

				<p><?= $productModel->prod_desc ?></p>

			</div>

			<form class="quantityForm">

		              <label for="quantity-desired">Quantity Desired :</label>

		              <input type="number" class="form-control qty-text" id="quantity-desired">

		              	<input type="hidden" class="qty qty-text" value="1" />

		              	<a href="javascript:void(0)" productId='<?= $productModel->id ?>' class="btn qty-btn addTocart add-to-cart-btn addTocart1">Add to Basket</a>

			</form>

		</div>

		<!-- PRODUCT DETAILS END -->





		<!-- YOU MAY ALSO LIKE -->
<?php 

$prod_display = Products::find()->where(['is_deleted' => 0 ,'cat_id' => $productModel->cat_id])->orderBy(new Expression('rand()'))->limit(4)->all();

?>
		<div class="related-products-section">

			<h4 class="page-title">You may also like</h4>



		<!-- PRODUCT GRID -->
		<div class="products-wrapper container-fluid">
		    <div class="row no-gutters text-center products-grid">
<?php

foreach($prod_display as $prod_display)

{ 

?>

<?php 

 $category = Categories::find()->where(['id' => $prod_display->cat_id])->one();

?>
		

			

				<div class="col-xl-3 col-md-4 col-6 product-card mix">

					<img src="<?= yii::$app->params["backendDomain"] ?>uploads/displayimage/<?= $prod_display->prod_display_image?>" class="img-fluid">

					<h4><?= $prod_display->prod_name ?></h4>

					<h6><?= $category->cat_name ?></h6>

					<a href="<?= yii::$app->homeUrl ?>product/product_details?product=<?= $prod_display->url_name ?>" class="product-link"></a>

				</div>

			
	<?php } ?>
	</div>

		</div>

		<!-- PRODUCT GRID  END-->

		</div>

		<!-- YOU MAY ALSO LIKE END -->

</div>

	<!-- CONTENT END -->


<script>
	function init()
	{
      setMenuActive('product');
	}
</script>

