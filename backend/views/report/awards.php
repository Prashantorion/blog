<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;

?>

<div class="container tabs01">
<div class="col-md-12 col-sm-12">
<h2><span>Awards</span></h2>


<?php $form = ActiveForm::begin(['action' =>'awards','options' =>['class' => 'forms01']]); ?>
	
<div class="col-md-4 col-sm-6">
<h3>Filter By Dates</h3>
<!-- <p class="control-label">Select only START DATE if you want to get list of a particular date only.</p> -->
<br/>

<?= $form->field($model, 'start_date')->textInput(['maxlength' => true,'class' => 'datepicker', 'id' => 'startDate']) ?>

<?= $form->field($model, 'end_date')->textInput(['maxlength' => true,'class' => 'datepicker1', 'id' => 'endDate']) ?>

<?= $form->field($model, 'type')->dropDownList(['0' => 'Chef Of The Year','1' => 'Planned Kitchen','2' => 'Best Eco Friendly Kitchen','3' => 'Best Modern Kitchen', '4' => 'Kitchen Display', '5' => 'Designer Kitchen', '6' => 'Best Menu Planner', '7' => 'Open Kitchen', '8' => 'Best Institute Of The Year'],['prompt'=>'Select...']); ?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Get Report" class="" /> 
</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>


</div>
</div>