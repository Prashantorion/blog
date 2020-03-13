<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="clearfix"></div>

		<?php $form = ActiveForm::begin(['id' => 'login','action' => 'login','options' =>['class' => 'loginForm']]); ?>
					

<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>
<?= $form->field($model, 'password')->textInput(['maxlength' => true, 'placeholder' => 'Password', 'type' => 'password']) ?>

<input type="submit" id="talysubmit" value="Login" />

 <p class="center small-text2 vpad10"> Cannot Access your account? <a href="<?= yii::$app->homeUrl ?>site/forgot_password" class="w600">Click Here</a></p>           




<?php ActiveForm::end(); ?>
