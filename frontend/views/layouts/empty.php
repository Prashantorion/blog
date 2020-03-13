<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Thank You</title>
<style>
<!--
table {
  margin:0;
  padding:0;
  border:0;
  outline:0;
  font-weight:inherit;
  font-style:inherit;
  font-size:100%;
  font-family:inherit;
  vertical-align:baseline;
}
table {
  border-collapse:separate;
  border-spacing:0;
}
.print{
width:700px;
clear:both;
padding:5px;
display:block;
margin:5px auto;
border-collapse: collapse;
background:url('../../../../Inhouse%20Projects/Seal%20Ashram/donate/images/ariisto-png.png') no-repeat center;

}



p {
  margin:0;
  padding:0;
  border:0;
  outline:0;
  font-weight:inherit;
  font-style:inherit;
  font-size:100%;
  font-family:inherit;
  vertical-align:baseline;
}
p{
 font-family: Georgia, "Times New Roman", Times, serif;
font-size:10pt;
text-align:justify;
line-height:150%;
color:#333;
}

.print p{
font-weight:400;
}


td {
  margin:0;
  padding:0;
  border:0;
  outline:0;
  font-weight:inherit;
  font-style:inherit;
  font-size:100%;
  font-family:inherit;
  vertical-align:baseline;
}
td {
  text-align:left;
  font-weight:normal;
}
.print td{
vertical-align:middle;
padding:5px 0;
}


.print .small p{
font-weight:400;
font-size:9pt;
}


-->
</style>
</head>
<body>
<?php $this->beginBody() ?>
     <?= $content ?>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
