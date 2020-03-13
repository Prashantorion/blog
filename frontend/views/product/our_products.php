<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Course;
use yii\web\View;
use backend\models\ProductsImages;
$this->registerJs("init();", View::POS_READY, 'page-init');
?>
<div class="content">
<h1 class="pageTitle">Our <span>Products</span></h1>
<div class="container-fluid innerpages">
<div class="contentBox1">
<?php
foreach($productList as $product)
{ ?>
<div class="col-md-3 col-sm-4 col-xs-6 productList">
<a href="<?= yii::$app->homeUrl ?>product/product_details?product=<?= $product->url_name ?>" class="productItem">
<img src="<?= yii::$app->homeUrl ?>images/products/<?= ProductsImages::find()->where(['prod_id' => $product->id])->one()->prod_image ?>" />
    </a>
<h3>
    <?= $product->prod_name ?>
    </h3>
</div>
<?php }
?>
    </div>
</div>
<div class="clearfix"></div>
</div>
<script>
	function init()
	{
      setMenuActive('product');
	}
</script>