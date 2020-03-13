<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\custom\UtilFunctions;
use yii\web\View;
use backend\models\Inquiries;
use backend\models\InquiriesProducts;
use backend\models\Products;
use backend\models\Reports;
use yii\grid\GridView;

 


[
       
    		'attribute' =>'Inquiries',
    		'value' =>'Inquiries.prod_id',

               // ...
    ]
 
//$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="container leftSided hpad5">
<div class="col-md-12 col-sm-12">
<div class="boxType01">  
<h2>Inquiries</h2>
<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
	
	<td>id</td>
<td>Fullname </td>
<td>Email</td>
<td>mobile</td>
<td>City </td>
</tr>
</thead>
<tbody>
<?php


foreach($inquiriesList as $Inquiries)
{	?>

	<tr>
		
	<td><?= $Inquiries->id ?></td>
	<td><?= $Inquiries->full_name ?></td>
	<td><?= $Inquiries->email ?></td>
	<td><?= $Inquiries->mobile ?></td>
	<td><?= $Inquiries->city ?></td>
	<td><a href="<?= yii::$app->homeUrl ?>report/edit?id=<?= $Inquiries->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a> <a href="<?= yii::$app->homeUrl ?>inquiries/delete?id=<?= $Inquiries->id ?>" onclick="return confirm('Are you sure you want to delete this product ?');" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a></td>
	</tr>

	<?php }?>
</tbody>
</table>
</div>
</div>
</div>

<script>

function init()
{
	

	
}


</script>