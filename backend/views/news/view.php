<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\custom\UtilFunctions;

use yii\web\View;

use backend\models\News;

$this->registerJs("init();", View::POS_READY, 'page-init');



?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">  

<h2> Blog List</h2>

<table class="table1 table table-responsive">

	<thead>

<tr class="first-child">

<td class="img-prv">Preview Image</td>

<td>Blog title</td>

<td>Status</td>

<td>Action </td>

</tr>

</thead>

<tbody>

	

<?php



foreach($newslist as $newslist)

{	?>



	<tr>



	<td><img src="<?= yii::$app->homeUrl ?>uploads/newsimage/<?= $newslist->news_image ?>"></td>

	<td><?= $newslist->news_title ?></td>
	<td>
		     
	<input type="checkbox" id="stockCheck<?= $newslist->id ?>"  data-toggle="toggle" data-on="Active" data-off="Inactive"  data-onstyle="primary" data-size="normal" <?php if($newslist->blog_status == 0){ echo "checked"; }else{ } ?> onclick="myFunction()">
	</td>

	<td><a href="<?= yii::$app->homeUrl ?>news/edit?id=<?= $newslist->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a> <a href="<?= yii::$app->homeUrl ?>news/delete?id=<?= $newslist->id ?>" onclick="return confirm('Are you sure you want to delete this product ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a></td>

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