<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-register');

?>

<style>


hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #000;
}
</style>

<script>

var userCount = <?= count($model->user_name) ?>;
</script>

<div class="container">

<?php $form = ActiveForm::begin(['action' =>'users_upload','options' =>['class' => 'forms01','enctype' => 'multipart/form-data']]); ?>
	
<div class="col-md-12 col-sm-6">
<h3>List of users which will get uploaded</h3>

<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
<td>User Name</td>
<td>Email</td>
<td>Mobile</td>
<td>Password</td>
<td>Employee Id</td>
</tr>
</thead>
<tbody>
<?php 

for($i=0;$i<count($model->user_name);$i++)
{	?>

	<tr>
	<td><label name="UsersUpload[user_name][]"><?= $model->user_name[$i] ?></label></td>
    <td><label name="UsersUpload[user_email][]"><?= $model->user_email[$i] ?></label></td>
    <td><label name="UsersUpload[user_mobile][]"><?= $model->user_mobile[$i] ?></label></td>
    <td><label name="UsersUpload[password][]"><?= $model->password[$i] ?></label></td>
    <td><label name="UsersUpload[emp_id][]"><?= $model->emp_id[$i] ?></label></td>
	</tr>

	
<?= $form->field($model, 'user_name['.$i.']')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'user_email['.$i.']')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'user_mobile['.$i.']')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'password['.$i.']')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'emp_id['.$i.']')->hiddenInput()->label(false) ?>  

	<?php }?>
</tbody>
</table>
 
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Submit" onclick="return checkCount();" /> 
</div>

<div class="clearfix"></div>

<hr/>
<h3 class="error-list">List of users with errors</h3>

<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
<td>User Name</td>
<td>Email</td>
<td>Mobile</td>
<td>Password</td>
<td>Employee Id</td>
<td>Error Details</td>
</tr>
</thead>
<tbody>
<?php 

for($i=0;$i<count($model->error_user_name);$i++)
{	?>

	<tr>
	<td><?= $model->error_user_name[$i] ?></td>
    <td><?= $model->error_user_email[$i] ?></td>
    <td><?= $model->error_user_mobile[$i] ?></td>
    <td><?= $model->error_password[$i] ?></td>
    <td><?= $model->error_emp_id[$i] ?></td>
    <td><?= $model->error_details[$i] ?></td>
	</tr>

	<?php }?>
</tbody>
</table>



<?php ActiveForm::end(); ?>

</div>


<script>

function init()
{
	
}

function checkCount()
{
	//alert(userCount);
	if(userCount == 0)
	{
		alert('No users available for addition');
		return false;
	}

	var a = confirm('Are you sure you want to add these '+userCount+' user(s)?');
	if(a)
	{
		return true;
	}
	else
	{
		return false;
	}
}

</script>