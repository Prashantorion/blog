<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use backend\models\Competency;
use backend\models\University;
use backend\models\Course;
use yii\web\View;
use backend\models\Brand;
use backend\models\Products;
use backend\models\ProductsImages;
use yii\bootstrap\Modal;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<div class="contents">

<!-- Banners -->
<div class="innerTitles">
<div class="container">
<div class="col-md-5 col-sm-5">
<h1><span><a href="index.htm" class="titleLink"><i class="fa fa-home" aria-hidden="true"></i></a><a href="awards.htm" class="titleLink">Awards</a><a href="awards.htm" class="titleLink disabled">Terms & Conditions</a></span></h1>
</div>
<div class="col-md-7 col-sm-7">
				
</div>
</div>
</div>
<div class="clearfix"></div>
<!-- Home Content -->
<div class="container">
<div class="col-md-8 col-sm-9">
<div class="contentBoxLeft">
<h2 class="sectionTitle"><span>Definitions</span></h2>
<table class="table2 table table-responsive">
<tr class="">
<td>Awards</td>
<td>Better Kitchen Awards 2016</td>
</tr>
<tr class="">
<td>Awards Management</td>
<td>Bandwagon Media Private Limited</td>
</tr>
<tr class="">
<td>Jury</td>
<td>A group of persons appointed by Awards Management to determine the nominees and determine winners</td>
</tr>
<tr class="">
<td>Participant</td>
<td>Any eligible individual that participates by logging on the website and registering for the Awards</td>
</tr>
<tr class="">
<td>Terms and conditions ("T&C" or "Terms")</td>
<td>These terms governing the Awards, as may be amended from time to time</td>
</tr>
<tr class="">
<td>Website</td>
<td><a href="http://www.betterkitchen.in">www.betterkitchen.in</a></td>
</tr>
</table>

<div class="clearfix"></div>
<ul class="bullet01">
<li>These Terms, Conditions and Guidelines are applicable to and govern the "Better Kitchen Awards 2016" organized and conducted by Bandwagon Media Private Limited</li>
<li>By participating in the Awards, Participant agrees to abide by and be bound by these Terms.</li>
<li>These Terms may be modified without any prior notification. Participant is advised to regularly review these Terms. 
If there is any disagreement with any of the Terms and any amendments thereto, Participant must not participate in the Awards.</li>
</ul>

<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Awards objective</span></h2>
<p>To recognize and honour achievements of Indians residing in Asia Pacific, Middle East, United State of America & United Kingdom who have demonstrated success, vision and courage 
which has brought glory to India and Indian community living abroad</p>
<h2 class="sectionTitle"><span>Awards categories</span></h2>
<p>Award categories as defined by the Terms are as follows :</p>
<div class="clearfix"></div>
<table class="table1 alignLeft table table-responsive">
<tr class="">
<td colspan="4">Application Based Awards</td>
</tr>
<tr class="styled">
<td>Sr.</td>
<td>Name of the category</td>
<td>Definition</td>
<td>Who can apply</td>
</tr>
<tr class="">
<td>1.</td>
<td>Designer Kitchen  
(Commercial and Domestic)
</td>
<td>Kitchens designed for restaurants , cafes , hotels or houses </td>
<td>Kitchen Planners<br>
(Individuals or Companies)</td>
</tr>
<tr class="">
<td>2.</td>
<td>Open Kitchen</td>
<td>A design-led open kitchen space fit for family, restaurants, hotels</td>
<td>Kitchen Planners<br>
(Individuals or Companies)</td>
</tr>
<tr class="">
<td>3.</td>
<td>Educational Institutes of the year</td>
<td>Institutes offering best kitchen &amp; Hotel management courses in India , that 
also uses innovative techniques and methods to educate the students</td>
<td>Hotel management institutes in India (Private &amp; Government)</td>
</tr>
<tr class="">
<td>4.</td>
<td>Planned Kitchen <br>
(Commercial and Domestic)</td>
<td>Kitchen space planned by the builders in a new constructed housing or 
commercial property</td>
<td>Property Owners, Builders</td>
</tr>
<tr class="">
<td>5.</td>
<td>Eco-friendly Kitchen</td>
<td>Restaurants using eco-friendly appliances, fuel efficient products, solar 
lighting system in their daily routines</td>
<td>Property Owners, Builders</td>
</tr>
<tr class="">
<td>6.</td>
<td>Modern Kitchen</td>
<td>Restaurants using most innovative and latest technology driven Kitchen 
Products which has improved their efficiency and resulted in better customer 
satisfaction.</td>
<td>Property Owners, Builders</td>
</tr>
<tr class="">
<td>7.</td>
<td>Chef of the year</td>
<td>Chefs to be nominated by hotels , restaurants or Chefs can self-nominate 
themselves providing references</td>
<td>Property Owners, Builders</td>
</tr>
<tr class="">
<td>8.</td>
<td>Menu Planner</td>
<td>To award professionals who plan content design and layout of the menu card.</td>
<td>Chefs of the restaurants/Individual Menu planners</td>
</tr>
<tr class="">
<td>9.</td>
<td>Kitchen Display in retail showrooms</td>
<td>Retail stores with outstanding kitchen Displays for public sale</td>
<td>Retail Stores , Manufacturers with stand-alone showrooms, Malls, Individual 
freelancers showrooms etc</td>
</tr>
</table>
<div class="clearfix"></div>
<table class="table1 alignLeft table table-responsive">
<tr class="">
<td colspan="2">Jury Driven Awards</td>
</tr>
<tr class="">
<td>1.</td>
<td>Best Overall Kitchen
</td>
</tr>
<tr class="">
<td>2.</td>
<td>Lifetime Achievement Award- Chef</td>
</tr>
<tr class="">
<td>3.</td>
<td>Product of the Year</td>
</tr>
</table>
<div class="clearfix"></div>
<ul class="bullet01">
<li>The Award categories may be changed / modified / split / merged / increased or cancelled by the Jury based on the number and quality of entries received in each category</li>
<li>Awards management / jury may apply minimum cap for the category to be awarded to maintain high standards of Awards. This is at the discretion of Awards management / Jury and this cannot be contested in any manner.</li>
<li>In the event that no Participant in a category are found to be worthy of inclusion by the Jury, the Award category may be cancelled by the Jury. 
The Jury may decide to add nominees in the category to maintain high standards of participation. The decision of the Jury in this regard will be final and non-contestable. 
The Awards management will not entertain any queries in this regard</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span class="twoLine">Eligibility Criteria for participation in the Awards</span></h2>
<ul class="bullet01">
<li>The nominee should be a citizen of India and must be above 18 years of age as on September 30, 2016.</li>
<li>The last date to submit the application forms is November 15, 2016.</li>
<li>The forms should be filled in English only.</li>
<li>Please fill a separate form for each category, and send the correct entry form for submitting your entries.</li>
<li>The participants can send multiple application forms for same category provided it is for a different initiative/product/design. If multiple entry forms are received for the same category, only the first form will be considered, and the others will be disqualified.</li>
<li>All questions in the application forms are mandatory and should be answered. Incomplete forms may not be considered.</li>
<li>Please provide supporting documents wherever possible to support your entry's details like - (i) Blue Prints and sketches (ii) Photographs of the Kitchen (iii) Floor Plan (iv) Photos of the final design (v) Any other relevant documents</li>
<li>The initiative/product/menu/ should have been launched/implemented between October 1, 2014 and September 30, 2016. This should be evidenced through relevant supporting and testimonials.</li>
<li>For "Chef of the year" category the Chefs can be either nominated by the restaurant/hotel owners, or they can self - nominate themselves. In case of self-nomination, the Chefs will have to provide two references from the Manager or any other employees above that designation from the restaurants/hotels where he is currently employed.</li>
<li>On completion, the Participant must sign off the Declaration and agree to the terms & conditions of the Awards. Unauthorized forms can be disqualified at the discretion of the management of the Awards.</li>
<li>Please maintain one copy of the filled forms in your records.</li>
<li>In case of any queries relating to the Application Forms or participation in the Awards please write to us on abc@abc.com</li>
<li>For detailed terms & conditions, please visit 
<a href="http://www.betterkitchen.in">www.betterkitchen.in</a> </li> 
<li>Employees and immediate family members of BANDWAGON, sponsors and partners of the awards are not allowed to participate in the Awards</li>
<li>The final eligibility of the Participant will be subject to the discretion and approval of Jury</li>
<li>Participation in the awards is subject to defined terms and conditions available on website 
<a href="http://www.betterkitchen.in">www.betterkitchen.in</a> </li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Timelines</span></h2>
<ul class="bullet01">
<li>Efforts will be made to adhere to the defined timelines. However, the defined timelines are subject to change based on circumstances.</li>
<li>Awards Management and its sub-contractors shall not be held accountable / liable for any disruptions / stoppages / interruptions or cancellation of the Awards 
or its ceremony or any part of its processes or public voting on account of any factors beyond its control</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Call for Entries & Participation</span></h2>
<ul class="bullet01">
<li>The call for entries for the Awards will be announced in one or more media platforms and / or by direct communication with potential Participants, and that shall be construed to be adequate notice for call for entries</li>
<li>Participant can apply for the Awards by only by submitting the form online. No other medium will be accepted. Participants have to log on to the website www.betterkitchen.in and fill the forms online.</li>
<li>A Participant can participate in multiple award categories or send multiple entries in each award category provided each entry is for a different initiative. However, if multiple forms are filled for the same initiative are filled then only the first form will be considered for the evaluation of the Awards</li>
<li>The Jury has the right to reclassify application forms from one category to another, at its discretion</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Receipt of Entries</span></h2>
<ul class="bullet01">
<li>All entries must be submitted on the website 
<a href="http://www.betterkitchen.in">www.betterkitchen.in</a></li>
<li>Last date for receiving completed application forms is 
<span style="background-color: #FFFF00">November 05, 2016</span></li>
<li>Receipt of application forms after last date of receipt specified may be permitted only at the discretion of the Awards Management</li>
<li>Awards Management will not be responsible for application forms that are damaged / lost due to lack or lapse in any communication on account of internet failure</li>
<li>Participation in the Awards in any manner will be construed as an acceptance to the Terms and conditions stated herein</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span class="twoLine">Completeness of Entries/ Disqualification</span></h2>
<ul class="bullet01">
<li>Forms should be filled in English only.</li>
<li>All questions must be answered. Incomplete forms may not be considered.</li>
<li>Participants need to demonstrate level of success achieved in the category he/she has applied for in the case study section</li>
<li>A participant can send entries in more than one award categories provided it is for a separate initiative. A separate form should be used for each initiative.</li>
<li>Please maintain one copy of the completed form with you for your records</li>
<li>Please provide up to 3 supporting documents wherever possible, to support your entry details</li>
<li>All forms must be submitted on the website by latest 
<span style="background-color: #FFFF00">November 15, 2016</span></li>
<li>The supporting documents can also be directly uploaded on the website 
<a href="http://www.betterkitchen.in">www.betterkitchen.in</a><br>(Maximum size that can be uploaded is 
<span style="background-color: #FFFF00">XX</span> MB) along with the application form</li>
<li>Disqualification of entries is at the sole discretion of the Jury, on a case by case basis</li>
<li>If at any time, during the Awards process or post the Awards, any information provided by any Participant is found to be incorrect in any manner, then the Participant will be disqualified from the Awards</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Additional Information</span></h2>
<ul class="bullet01">
<li>Participants may be contacted for any additional information or / and conduct field visit to verify the information provided. Such information sourced from the Participants will become part of the original application.</li>
<li>The entity must have the necessary licenses and registrations in order. Awards Management has the right to ask for documentary proof of information.  If such a request is made and the Participant does not comply within 5 working days from the date the request is made, the Participant may be disqualified from participation in the Awards</li>
<li>Information provided by the Participant will be confidential and will be used only for the limited purpose of evaluating the Participant's entry to these Awards.</li>
<li>Awards Management or team appointed by Awards Management will try to contact the Participant on best effort basis by any means deemed appropriate.</li>
<li>In the event it is not possible to contact any Participant to obtain information on them, interview them, etc. such Participant may be disqualified from further participation</li>
<li>The participant hereby irrevocably authorizes the Awards Management to use the data gathered during and/or the Awards in respect of the participants. This shall be the property of BANDWAGON and BANDWAGON shall be entitled to use the same in its communications including marketing promotions and advertisements along with/without BANDWAGON's brand.</li>
<li>Awards Management shall not be liable in any manner for any mishap, accident, injury or damages etc. of whatsoever nature, caused to the participants during the Awards. Further, Awards Management shall not be liable in any manner for any loss, damage, theft, or any other mishap caused during the Awards.</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span class="twoLine">Validity and Correctness of Information</span></h2>
<ul class="bullet01">
<li>If at any time, including after the conclusion of any of the Award ceremonies, any information provided by any Participant(s), is found to be incorrect in any manner, 
then the Participant will be liable to be disqualified and / or return the Award and the monetary emoluments provided to the Participant under this Award, if any. 
Awards Management may also take penal action against the Participant for providing false information to participate in the Awards</li>
<li>Determination of whether information provided as fair and accurate rests with the Jury and Awards Management</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>General</span></h2>
<ul class="bullet01">
<li>Participant agrees that the Participant is legally capable of entering and, if selected, participating in the Awards and agree to the Terms and that Participant is competent (i.e. Participant are of legal age and mental capacity) and eligible to enter into this legally binding agreement on Participant.</li>
<li>Participant understands and agrees that merely participating in this Awards does not entitle the Participant to a prize or to any other form of consideration</li>
<li>Participant warrants and represents to the Awards Management that all information including any communications, software, photos, text, video, graphics, music, sounds, images and other material submitted or recorded in any manner by the Participant or the partners of Awards Management including Awards Management for consideration for the Awards are solely owned by the Awards Management and do not infringe upon any other individual or organizational rights (including, without limitation, intellectual property rights). Participant shall be completely responsible for handling any infringement or alleged infringement and shall indemnify the BANDWAGON entities (in India or abroad), and the Awards Management from any claims, costs or damages from infringement or alleged infringement of the logo or trademark or the defense of a claim or any costs payable thereof.</li>
<li>Participant must enter the Awards at their own will and the Awards Management are not in any way obligated or liable for any loss or costs that the Participant may suffer or incur and nothing is payable to the Participants for participating in the Awards or any event prior to or following the Awards.</li>
<li>Participants for the purpose of entering the Awards, automatically grants BANDWAGON a royalty-free, irrevocable, worldwide, non-transferable, non-exclusive right and license to use and display such entry, for participation in the Awards, and any intellectual property in relation to and arising out of such participation in the Awards and footage thereof, which shall include trade publications, press releases, electronic posting to the Website, the BANDWAGON website in any display format selected by BANDWAGON during the Awards or use by BANDWAGON as it deems fit.</li>
<li>The Awards Management reserves the right to, at its discretion, withdraw or amend or add to the T&C of the Awards at any time, with prospective or retrospective effect, and does not take responsibility for any loss or damage that any individual or organization may suffer as a result of participating or attempting to participate in the Awards, the Awards being withdrawn or its Terms amended.</li>
<li>Should a Participant wish to withdraw from the Awards, kindly inform Awards management in writing at any time up to one week prior to the final awards ceremony</li>
<li>All disputes relating to or arising out of the Awards shall be subject to the laws of India, and shall be subject to the exclusive jurisdiction of the courts of competent jurisdiction at Mumbai, India</li>
<li>The Participants indemnify BANDWAGON, its employees, officers, contractors, partner or other persons used by them in relation to this Awards and hold them harmless against any loss, claim, demands, costs, damages, judgments, expenses or liability (including legal costs) arising out of or in connection with any or all claims, that may be brought against the Awards Management by any third party in connection with the Participants participation in or winning the Awards, which is inconsistent with any of the warranties and representations made by the Participants, or due to breach of these Terms and shall reimburse BANDWAGON for any loss, costs, expense, or damage to which said indemnity applies. BANDWAGON shall give the Participant prompt written notice of any claim or actions covered by this indemnity, and the Participant shall have the right, at its own expense, to participate in any such action.</li>
<li>Decision of Awards Management on all matters is final and binding on all Participants and no correspondence will be entertained on the same.</li>
<li>In the event these Terms do not cover any question or complaint in relation to the Awards, the same will be concluded on by the Awards Management (for all other issues) or an independent body or legal team as appointed by the Awards Management and deemed necessary.</li>
<li>The Participant agrees to give full consent unconditionally for BANDWAGON to share any information provided by the Participant with agencies working with them with regards to the program, its recording and broadcasting and related activities including agencies involved with BANDWAGON</li>
<li>The decision of BANDWAGON in relation to the interpretation of any of these Terms shall be final and binding on the participants.</li>
<li>If Participants are unclear as to the Terms or any element of the Awards or have any queries/concerns pertaining to the Awards, they can write in with their questions, concerns or queries to the following address:
<br>
Mr. / Ms. _____________________
Subject: Better Kitchen Awards 2016_Name of the Participant_Category<br>
<span style="background-color: #FFFF00">[Email address]</span><br>
BANDWAGON shall endeavour to the best of its ability to respond thereto.
</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Website</span></h2>
<ul class="bullet01">
<li>The website is only an informational website (www.betterkitchen.in) (the "Website") for the Awards. 
BANDWAGON or its subsidiaries or holding entities are not liable or responsible for any action or decision taken by Participant or anyone acting on Participant's 
behalf or under Participant employment or under contract with Participant. BANDWAGON shall not be under any obligation to Participant and Participant shall have no obligation or 
rights in relation to the Awards and shall have no claims whatsoever against the BANDWAGON relating to the selection process or the running of the Awards.</li>
<li>BANDWAGON shall not be responsible for :
<ul>
<li>any delivery, failures relating to the registration or uploading videos/presentations;</li>
<li>any SPAM generated messages as result of Participant accessing the Website;</li>
<li>Awards Management not receiving or rejecting any data;</li>
<li>any lost, late or misdirected computer transmission or network, electronic failures of any kind or any failure to receive entries owing to transmission failures or due to any technical reasons and</li>
<li>Other conditions/situations or failures beyond its control</li>
</ul>
</li>
</ul>
<div class="clearfix"></div>
<h2 class="sectionTitle"><span>Disclaimers</span></h2>
<p>Awards Management has no obligation to screen the entry material in advance, and is not responsible for monitoring entries for the purpose of preventing violation of 
intellectual property ownership rights, or violations of any law, rule or regulation. If Awards Management is notified of submissions or materials that may not conform to the Terms, 
it may investigate the allegation and determine in good faith and in its sole discretion whether to eliminate such an entry from consideration. 
The Awards Management has no liability or responsibility to Participants or other users of the Website for performance or non-performance of such activities.</p>

<div class="clearfix"></div>
</div>
</div>
<div class="clearfix"></div>



</div>
</div>

<script>

	function init()
	{
      //setMenuActive('contact-us');
	}

  


</script>
