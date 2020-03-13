<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\custom\UtilFunctions;
use yii\web\View;
use backend\models\ProductsImages;

$this->registerJs("init();", View::POS_READY, 'page-init');
 
?>

<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">  

<h2><span>Product List</span></h2>
<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
<td>Image</td>
<td>Name</td>
<td>Created Date</td>
<td>Featured</td>
<td>New</td>
<td>Action </td>
</tr>
</thead>
<tbody>
<?php 

foreach($productsList as $product)
{	?>

	<tr>
	<td><img src="<?= yii::$app->homeUrl ?>uploads/displayimage/<?= $product->prod_display_image ?>" /></td>
	<td><?= $product->prod_name ?></td>
	<td><?= UtilFunctions::convertPhpToNormalDate($product->created_date) ?></td>

	<td>
    <input type="checkbox" checkId="<?= $product->id ?>" name="Product[prod_latest][<?= $product->id ?>]" id="checkStatus" class='checkBox' value="<?= $product->prod_latest ?>"

<?php

      if($product->prod_latest == '1')
      {
        echo 'checked';
      }

    ?>

     />
     
  </td>

  <td>
    <input type="checkbox" checkId="<?= $product->id ?>" name="Product[prod_new][<?= $product->id ?>]" id="checkStatus" class='checkBox' value="<?= $product->prod_new ?>"

<?php

      if($product->prod_new == '1')
      {
        echo 'checked';
      }

    ?>

     />
     
  </td>

	<td>
		<a href="<?= yii::$app->homeUrl ?>product/update?id=<?= $product->id ?>" onclick="return confirm('Are you sure you want to update as a Featured Product ?');" title="Featured" class="right-mgn10"><i class="fa fa-refresh color-orange"></i></a>

		<a href="<?= yii::$app->homeUrl ?>product/new?id=<?= $product->id ?>" onclick="return confirm('Are you sure you want to update as a Featured Product ?');" title="New" class="right-mgn10"><i class="fa fa-refresh color-orange"></i></a>

		<a href="<?= yii::$app->homeUrl ?>product/edit?id=<?= $product->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a>
		 <a href="<?= yii::$app->homeUrl ?>product/delete?id=<?= $product->id ?>" onclick="return confirm('Are you sure you want to delete this product ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a>
	</td>
</tr>

	<?php }?>
</tbody>
</table>
</div>
</div>
</div>
<div class="clearfix"></div>
<script>

function init()
{
	

	
}


</script>