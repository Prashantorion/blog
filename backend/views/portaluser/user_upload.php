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
a:hover {
    color: #7F0505 !important;
    text-decoration: none;
}

a:link {
    color: #F30505;
}

</style>

<div class="container">

<?php $form = ActiveForm::begin(['action' =>'users_upload','options' =>['class' => 'forms01','enctype' => 'multipart/form-data']]); ?>
	
<div class="col-md-4 col-sm-6">
<h3>Upload Users</h3>

<a href="<?= yii::$app->params['defaultDomain'] ?>web/user_upload_sample.xlsx">Click here to download sample xls file</a>

<?= $form->field($model, 'upload_file')->fileInput(['maxlength' => true]) ?>

</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12">
<input type="submit" value="Upload File" class="" /> 
</div>

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

</div>


<script>

function init()
{
	
}

</script>