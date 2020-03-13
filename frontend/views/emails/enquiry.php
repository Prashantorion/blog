<?php



/* @var $this yii\web\View */







use yii\bootstrap\ActiveForm;



use yii\helpers\Html;



use frontend\custom\UtilFunctions;



use yii\web\View;



use backend\models\Project;


//$this->registerJs("init();", View::POS_READY, 'page-init');


?>



<div style="position:relative; display:block; padding:2.5% 2.5% 0.15%; margin:20px; background-color:#f9f9f9; min-height:100%;">

<table style="width:100%; margin:0 auto 50px; clear:both; display:table; border-collapse: collapse; border:0;">

  <tr>

    <td style="line-height: 150%; text-align: left; margin-top: 0; padding: 5px; background-color: #f9f9f9">

    <img src="<?= yii::$app->params["frontendDomain"] ?>images/logo.png" style="width:236px; height:auto; display:block; margin:0;"/></td>

    <td style="line-height: 150%; text-align: center; margin-top: 0; padding: 5px; background-color: #f9f9f9; text-align: right; font-family:'Arial', san-serif; font-size:30px; color:#333333; font-weight:700; text-transform:uppercase; letter-spacing:-2px;">

    </td>

  </tr>

  <tr>

    <td colspan="2">&nbsp;</td>

  </tr>

</table>





<p style="font-family:'Arial', san-serif; font-size:14px; color:#222; font-weight:600; display:block; padding-bottom:15px; line-height:150%;">Greetings Admin,</p>

<p style="font-family:'Arial', san-serif; font-size:14px; color:#666; font-weight:700; display:block; padding-bottom:15px; line-height:150%">

We have received an inquiry from our website:</p>

<table style="border:1px solid #666666; padding:5px; width:550px; clear:both; display:table; border-collapse: collapse; font-family:'Arial', san-serif; font-size:14px; border-spacing:2px; font-weight:700; margin-left:0; margin-right:0; margin-top:30px; margin-bottom:0px">

  <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">Customer Name</td>

    <td style="padding:10px; border:1px solid #333333; "><b><?= $model->fullname ?></b></td>

  </tr>

  <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">Email Address</td>

    <td style="padding:10px; border:1px solid #333333; "><b><?= $model->email ?></b></td>

  </tr>
  
  <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">From Place </td>

    <td style="padding:10px; border:1px solid #333333; "><b><?= $model->from_place?></b></td>

  </tr>
 

  <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">Mobile Number</td>

    <td style="padding:10px; border:1px solid #333333; "><b><?= $model->phone?></b></td>

  </tr>
  
  <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">Project Name</td>
<?php

$productsList = Project::find()->where(['id'=> $model->pro_id])->all();

foreach($productsList as $productsList)

{	?>
    <td style="padding:10px; border:1px solid #333333; "><b><?= $productsList->pro_name ?></b></td>
<?php }?>
  </tr>
  
    <tr>

    <td style="padding:10px; border:1px solid #333333; " width="152">Message</td>

    <td style="padding:10px; border:1px solid #333333; "><b><?= $model->info?></b></td>

  </tr>
  
    

  </table>


        

<table style="width:100%; margin:30px 0 15px; clear:both; display:table; border-collapse: collapse; font-family:'Arial', san-serif; font-size:11px; border-spacing:2px; ">

          <thead>

            <tr>

              <td class="text-left" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-left" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-left" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

              <td class="text-right" style="border-bottom-style: solid; border-bottom-width: 2px; padding-left: 0; padding-right: 0; padding-top: 4px; padding-bottom: 4px; text-align:center">

              &nbsp;</td>

            </tr>

          </thead>

          <tbody>

            <tr>

              <td class="text-left" style="padding: 5px; text-align:left" colspan="9">

              <b>Comfort Homes</b><br>

              G26 Metroplex Mall Naalya,P.O Box : 2753 Kampala.<br>

              Tel No : (+256) 706 525 352 , Email : 

              info@comfort-homes.com</td>

            </tr>

          </tbody>

          <tfoot>

          </tfoot>

        </table>        

</div>