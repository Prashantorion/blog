<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use backend\custom\UtilFunctions;

use yii\web\View;

use backend\models\Enquiry;

$this->registerJs("init();", View::POS_READY, 'page-init');



?>



<div class="container leftSided hpad5">

<div class="col-md-12 col-sm-12">

<div class="boxType01">  

<h2>Enquiry View</h2>

<table class="table1 table table-responsive">

	<thead>

<tr class="first-child">

<td>Full name</td>

<td>Email</td>

<td>Phone</td>

<td>Info</td>

<td>Actions</td>

</tr>

</thead>

<tbody>

	

<?php



foreach($enquirylist as $enquirylist)

{	?>



	<tr>






	<td><?= $enquirylist ->fullname ?></td>

<td><?= $enquirylist ->email?></td>
<td><?= $enquirylist ->phone ?></td>
<td><?= $enquirylist ->info?></td>

	<td><a href="#enquiryviewModal" title="View" class="right-mgn10 " id="viewModal" data-toggle="modal" ><i class="fa fa-eye"></i></a> </td>

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