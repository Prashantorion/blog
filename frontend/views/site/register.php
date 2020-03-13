<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

?>


<div class="container">

<div class="col-md-6 col-sm-6">
<form id="contactform" class="forms01" method="post" onsubmit="return sendEmail()">
<p>We just need thses details and you will enjoy full access to our awards and contest and also reecive our newletters</p>
<input type="text" placeholder="Full Name" name="fullname" id="fullname" required/> 
<div class="clearfix"></div>
<input type="email" placeholder="Email Address" name="emailadd" id="emailadd" required/> 
<div class="clearfix"></div>
<input type="text" placeholder="Mobile Number" name="mobileno" id="mobileno" required/> 
<div class="clearfix"></div>
<input type="submit" value="Register" class="floatleft"/>
<div class="clearfix"></div>
<div id="form-status"></div>
<div class="clearfix"></div>
</form>

</div>

<div class="clearfix"></div>


</div>


<div class="clearfix"></div>

</div>
