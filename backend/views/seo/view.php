<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="container leftSided hpad5">
<div class="col-md-12 col-sm-12">
<div class="boxType01">
<h2><span> Pages List</span></h2>
<table class="table1 table table-responsive">
<thead>
<tr class="first-child">
<td>Page URL</td>
<td>Page Title </td>
<td>Action </td>
</tr>
</thead>
<tbody>
<?php

foreach($seoList as $seoList)
{	?>

	<tr>
	<td><?= $seoList->url_name ?></td>
	<td><?= $seoList->page_title ?></td>
	<td>
	    <a href="<?= yii::$app->homeUrl ?>seo/edit?id=<?= $seoList->id ?>" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a>
	    
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