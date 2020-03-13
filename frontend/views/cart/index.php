<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Course;
use yii\web\View;
use backend\models\ProductsImages;
use backend\models\Categories;
use backend\models\Products;







$this->registerJs("init();", View::POS_READY, 'page-init');

?>
		<!-- CONTENT-->
<div class="content">

		<!-- JUMBOTRON -->

		<div class="jumbotron container-fluid">

			<div class="jumbotron-overlay"  style="background-image: url('images/blur-close-up-cutlery.png');"></div>

			<h1 class="page-title wow fadeInRight">Your<br>Enquiry</h1>

			<p class="wow fadeInRight title-p" data-wow-delay="1000ms">The product range we server consistis a large scale of choices in cutlery, lifestyle products & chafing dishes avilable in different material</p>

		</div>

		<!-- JUMBOTRON END -->



		<!-- CART TABLE SECTION -->

		<div class="container-fluid">


		<div class="row">
		<div class="col-md-7 col-12">
		<form class="pageForm cartList">

		<?php
		if(count($productList) > 0)
		{ ?>
			<h6 class="page-title">You have shown interest in following products.<br>If you wish to add more, go back to the products or else click on "Confirm Enquiry"</h6>

			<div class="row no-gutters table-th-row">

				<div class="col-md-8 col-sm-6 col-12 table-td">Product Description</div>

				<div class="col-md-4 col-sm-6 col-12 table-td">Manage Product/Quantity</div>

			</div>

				<?php
				$count = 0;
				foreach($productList as $product)
				{ 
					$count++;
					?>

			<div class="row no-gutters table-tb-row">

				<div class="col-md-8 col-sm-6 col-12 table-td desc">

					<img src="<?= yii::$app->params["backendDomain"] ?>uploads/products/<?= ProductsImages::find()->where(['prod_id' => $product->id])->one()->prod_image ?>" alt="<?= $product->prod_name ?>" title="<?= $product->prod_name ?>" />

					<a href="<?= yii::$app->homeUrl ?>product/product_details?product=<?= $product->url_name ?>"><?= $product->prod_name ?></a>	

				</div>

				<div class="col-md-4 col-sm-6 col-12 table-td std-text">

					<input type="number"class="qty qty-text" value="<?php if(isset($cartQty[$product->id])){echo $cartQty[$product->id];}else{echo 0;} ?>" />

					<button type="button"  title="Update" productId='<?= $product->id ?>' class="update update-from-cart-btn" data-original-title="Update"><i class="lnr lnr-sync"></i></button>

					<button href="javascript:void(0);" productId='<?= $product->id ?>' title="Remove product" class="remove delete-from-cart-btn" data-original-title="Remove"><span class="lnr lnr-cross"></span></button>
					

				</div>

			</div>
			<?php } ?>
		
			

		</form>
		
		
		</div>
		<div class="col-md-5 col-12">

		

			<?php $form = ActiveForm::begin(['action' =>'confirm_inquiry','options' =>['class' => 'pageForm inquiryForm']]); ?>

			<h6 class="page-title">Just a few details needed. All fields are compulsory.</h6>

			<div class="row query-form">

				<div class="col-12 form-group">


					<?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'placeholder' => 'Full Name (required)','required' => 'required'])->label(false) ?>

				</div>

				<div class="col-12 form-group">


					 <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'Email Address (required)','required' => 'required'])->label(false) ?> 

				</div>

				<div class="col-12 form-group">


					<?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'placeholder' => 'Mobile Number (required)','required' => 'required'])->label(false) ?>

				</div>

				<div class="col-12 form-group">

					<select class="form-control" name="Inquiries[typeofenquiry]" id="typeofenquiry">

						<option>You are </option>

						<option value="Indivudual / Customer">Indivudual / Customer</option>

						<option value="Distributor">Distributor</option>

						<option value="Shop/Business Owner">Shop/Business Owner</option>

						<option value="Online/eCommerce">Online/eCommerce</option>

						<option value="Other Business Interest">Other Business Interest</option>

						<option value="Others">Others</option>

					</select>

				</div>

				<div class="col-12 form-group">


					<?= $form->field($model, 'additional_instructions')->textArea(['maxlength' => true,'placeholder' => 'Additional Instructions (required)','required' => 'required'])->label(false) ?>

					

				</div>

				<div class="col-12">

					<input type="submit" value="Confirm Enquiry" />

					

				</div>

			</div>

		<?php ActiveForm::end(); ?>
	<?php }
	else
		{ ?>
				<div>
					<div>No Products added.</div>
					</div>
				<?php } ?>
		</div>

		</div>
		</div>

		<!-- CART TABLE SECTION END -->

</div>

<script>
	function init()
	{
		//setValues();
      // setMenuActive('product');
	}
</script>