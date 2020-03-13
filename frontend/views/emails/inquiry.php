<?php

/* @var $this yii\web\View */



use yii\bootstrap\ActiveForm;

use yii\helpers\Html;

use frontend\custom\UtilFunctions;

use yii\web\View;

use backend\models\ProductsImages;
use backend\models\Categories;





//$this->registerJs("init();", View::POS_READY, 'page-init');



?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 1</title>
</head>

<body>

<div style="position:relative; width:100%; display:block; text-align:center; padding:30px 10px;" align="center">
	<table style="width:700px; margin:auto; display:block; border-spacing: 3px;">
		<tr>
			<td style="padding: 15px 5px" height="102" colspan="2">
			<p align="center">
			<img border="0" src="<?= yii::$app->params["frontendDomain"] ?>web/images/logo.png" width="133" height="88" style="margin: 0 auto; display: block;"></td>
		</tr>
		<tr>
			<td style="text-align:center; padding: 30px 5px" colspan="2">
			<h3 align="center"><font color="#333333" face="Arial">We have received your request enquiring about following products.</font></h3></td>
		</tr>
		<tr>
			<td style="border:1px dotted #CCCCCC; padding-left:5px; padding-right:5px; padding-top:10px; text-align:center; padding-bottom:10px" colspan="2">
			<p align="center"><font face="Arial" size="2"><font color="#DAA520"><b>Customer Name 
			</b></font><b><font color="#DAA520">:</font> <font color="#333333"><?= $model->full_name ?></font></b></font></p></td>
		</tr>
		<tr>
			<td style="border:1px dotted #CCCCCC; padding-left:5px; padding-right:5px; padding-top:10px; text-align:center; padding-bottom:10px" width="350" align="center">
			<p align="center"><font face="Arial" size="2"><font color="#DAA520"><b>Customer Mobile</b></font><b><font color="#DAA520"> :
			</font><font color="#333333"><?= $model->mobile ?></font></b></font></p></td>
			<td style="border:1px dotted #CCCCCC; padding-left:5px; padding-right:5px; padding-top:10px; text-align:center; padding-bottom:10px" width="350" align="center">
			<p align="center"><font face="Arial" size="2"><font color="#DAA520"><b>Customer Email :</b></font><b> 
			<a href="mailto:<?= $model->email ?>"><font color="#333333"><?= $model->email ?></font></a></b></font></p></td>
		</tr>
		<tr>
			<td  style="border:1px dotted #CCCCCC; padding-left:5px; padding-right:5px; padding-top:20px; text-align:center; padding-bottom:20px" width="700" align="center" colspan="2">
			<p align="center"><font face="Arial">
			<font size="5" color="#DAA520">Instructions from Customer</font><br><br>
			<font color="#333333"><b><font size="2"><?= $model->additional_instructions ?>.</font></b>
			</font></font></p></td>
		</tr>
		<tr>
			<td  style="padding:5px; " width="700" align="center" colspan="2">
			&nbsp;</td>
		</tr>
	</table>
	<table  style="width:700px; margin:auto; display:block; ">
		<tr>
			<td width="60" height="40" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px; text-align:center; border-color:#DAA520" bgcolor="#DAA520" align="center">
			<b><font color="#FFFFFF" face="Arial" size="2">&nbsp;Sr. No.</font></b></td>
			<td width="540" height="40" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px; border-color:#DAA520" bgcolor="#DAA520">
			<b><font color="#FFFFFF" face="Arial" size="2">Product(s) Inquired</font></b></td>
			<td width="100" height="40" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px; text-align:center; border-color:#DAA520" bgcolor="#DAA520">
			<p align="center"><b><font color="#FFFFFF" face="Arial" size="2">Quantity</font></b></td>
		</tr>
		<?php 
		    $count = 0;
		    
		    foreach($productList as $product)
		    {
		        $count++;
		?>
		<tr>
			<td width="58" style="border: 1px solid #666666; text-align:center; padding: 5px" align="center">
			<font size="2" face="Arial" color="#333333"><b><?= $count ?>.</b></font></td>
			<td style="border: 1px solid #666666; padding: 5px"><p>
			<img border="0" src="<?= yii::$app->params["backendDomain"] ?>uploads/displayimage/<?= $product->prod_display_image?>" width="80" height="80" style="border: 1px solid #999999; padding: 2px; float:left; margin-right:10px;"><br>
			<b><font face="Arial" color="#DAA520"><?= $product->prod_name ?></font><font face="Arial" size="2"><br>
			<?php 
			   $catModel = Categories::findOne($product->cat_id);
			   
			   $catNameToDisplay = $catModel->cat_name.' '.$catModel->cat_sub_name;
			   
			   if(strlen($catModel->cat_name) == 0)
			   {
			       $catNameToDisplay = $catModel->cat_sub_name;
			   }
			?>
			<i><font color="#333333"><?= $catNameToDisplay ?>
</font></i>
</font></b>
</p></td>
			<td width="116" style="border: 1px solid #666666; text-align:center; padding: 5px">
			<p align="center"><b><font face="Arial" size="2" color="#333333"><?= $cartQty[$product->id] ?></font></b></td>
		</tr>
		<?php } ?>

	</table>
<table style="width:700px; margin:auto; display:block; ">
		<tr>
			<td style="padding-left:5px; padding-right:5px; padding-top:10px; padding-bottom:10px" colspan="2">
			&nbsp;</td>
		</tr>
		<tr>
			<td style="border:1px solid #999999; padding-left:5px; padding-right:5px; padding-top:10px; text-align:center; padding-bottom:10px" width="350" align="center">
			<p align="center"><font face="Arial" size="2"><font color="#DAA520">
			<b>Visit Website :</b></font><b> 
			<a href="www.brasslineindia.com"><font color="#333333">www.brasslineindia.com</font></a></b></font></p></td>
			<td style="border:1px solid #999999; padding-left:5px; padding-right:5px; padding-top:10px; text-align:center; padding-bottom:10px" width="350" align="center">
			<p align="center"><font face="Arial" size="2"><font color="#DAA520">
			<b>Support Email :</b></font><b> 
			<a href="mailto: brasslineindia@gmail.com"><font color="#333333">brasslineindia@gmail.com</font></a></b></font></p></td>
		</tr>
	</table>	
</div>


	
</body>


<script>
function init()
{

	
}
</script>

