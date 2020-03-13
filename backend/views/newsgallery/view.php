<?php

/* @var $this yii\web\View */


use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\custom\UtilFunctions;

use yii\web\View;

use backend\models\Banner;

$this->registerJs("init();", View::POS_READY, 'page-init');


?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">  

<h2>Blog Gallery List</h2>

<table class="table1 table table-responsive">

	<thead>

<tr class="first-child">

<td class="img-prv">Gallery Image</td>

<td>Gallery Title</td>

<td>Actions</td>

</tr>

</thead>

<tbody>


<?php

foreach($newsgallerylist as $newsgallerylist)

{	?>


	<tr>


	<td><img src="<?= yii::$app->homeUrl ?>uploads/newsgallery/<?= $newsgallerylist->news_gallery ?>"></td>

	<td><?= $newsgallerylist->news_gallery_title ?></td>

	<td><a href="<?= yii::$app->homeUrl ?>newsgallery/edit?id=<?= $newsgallerylist->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a> <a href="<?= yii::$app->homeUrl ?>newsgallery/delete?id=<?= $newsgallerylist->id ?>" onclick="return confirm('Are you sure you want to delete this newsgallery ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a></td>

	</tr>


	<?php }?>

</tbody>

</table>

</div>

</div>

<div class="clearfix"></div>

</div>

<div class="clearfix"></div>

<script>

function init()

{
	

}


</script>