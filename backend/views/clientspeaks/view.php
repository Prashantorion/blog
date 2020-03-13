<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Products;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">  

<h2>Enquiry List</h2>

<table class="table1 table table-responsive">
<thead>
<tr class="first-child">
<td>Date </td>
<td>Name</td>
<td>Email</td>
<!--<td>Project Name </td>-->
<td>Phone</td>


<td>Action</td>
</tr>
</thead>
<tbody>
<?php

foreach($clientList as $client)
{	?>

	<tr>
        <td><?=  UtilFunctions::convertPhpToNormalDate($client->created_date) ?> </td>
	<td><?= $client->full_name?></td>
	<td><?= $client->email?></td>
	<?php

//$productsList = Products::find()->where(['id'=> $client->prod_id])->all();

//foreach($productsList as $productsList)

//{	?>
	<!--<td><?//= $productsList->prod_name ?></td>-->
<?php //}?>
	<td><?= $client->mobile?></td>
	

	<td>
	<a href="#enquiryviewModal<?= $client->id ?>" title="View" class="right-mgn10 " id="viewModal" data-toggle="modal" ><i class="fa fa-eye"></i></a> 
	

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