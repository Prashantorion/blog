<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">

<h2><span>Category List</span></h2>

<table class="table1 table table-responsive">
<thead>
<tr class="first-child">
<td>Image</td>
<td>Name</td>
<td>Created Date</td>
<td>Action </td>
</tr>
</thead>
<tbody>
<?php

foreach($categoryList as $category)
{	?>

	<tr>
	<td><img src="<?= yii::$app->homeUrl ?>uploads/categories/<?= $category->cat_image ?>" /></td>
	<td><?= $category->cat_name ?></td>
	<td><?= UtilFunctions::convertPhpToNormalDate($category->created_date) ?></td>
	<td><a href="<?= yii::$app->homeUrl ?>category/edit?id=<?= $category->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a> <a href="<?= yii::$app->homeUrl ?>category/delete?id=<?= $category->id ?>" onclick="return confirm('Are you sure you want to delete this category ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a></td>
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