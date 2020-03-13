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

<h2><span>SubCategory List</span></h2>
<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
<td>Name</td>
<td>Action </td>
</tr>
</thead>
<tbody>
<?php 

foreach($subcategoryList as $subcategory)
{	?>

	<tr>
	<td><?= $subcategory->sub_cat_name ?></td>

	<td>
		<a href="<?= yii::$app->homeUrl ?>subcategory/edit?id=<?= $subcategory->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a>
		 <a href="<?= yii::$app->homeUrl ?>subcategory/delete?id=<?= $subcategory->id ?>" onclick="return confirm('Are you sure you want to delete this Subcategory ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a>
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