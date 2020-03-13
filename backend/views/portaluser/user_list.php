<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use frontend\custom\UtilFunctions;
use yii\web\View;

$this->registerJs("init();", View::POS_READY, 'page-init');

?>

<style>

.user-prof-img{width: 75px !important;}
</style>

<div class="container tabs01">
<div class="col-md-12 col-sm-12">
<h2><span>Users List</span></h2>
<div class="tabs">
<table class="table1 table table-responsive">
	<thead>
<tr class="first-child">
<td>Select</td>
<td>Name</td>
<td>Email</td>
<td>Mobile</td>
<td>Status</td>
<td></td>
</tr>
</thead>

</table>
</div>

<?php $form = ActiveForm::begin(['action' =>'change_status','options' =>['class' => 'forms01']]); ?>
	
<input type="hidden" id="ids_hidden" name="Users[check_list]"/>
<input type="hidden" id="to-disable_hidden" name="Users[to_enable]" />

<input type="submit" id="checkList" value="Disable User(s)" class="floatleft" onclick="return checkSelected();"/> 
<input type="submit" id="checkList" value="Enable User(s)" class="floatright" onclick="return checkSelectedEnable();"/> 

<div class="clearfix"></div>

<?php ActiveForm::end(); ?>

</div>
</div>

<script>

function init()
{
	 var columns =[
        {"render": function(data,type,row,meta){
          //  return '<input type="checkbox" class="checkbox" />';
            return "<input onclick='onCheckBoxClicked("+row.user_id+")' id=\"check_"+ row.user_id+"\" user-id='"+row.user_id+"' type=\"checkbox\" class=\"checkbox\" />";
          }
        },
        {"data" : "user_name"},
        {"data" : "user_email"},
        {"data" : "user_mobile"},
        { "render": function(data,type,row,meta){
              
              if(row.user_status == 0)
              {
              	return "Enabled";
              }

              return "Disabled";
          } 
        },
        { "render": function(data,type,row,meta){
              
              return '<a href="<?= yii::$app->params["defaultDomain"] ?>web/portaluser/user_edit?id='+row.user_id+'" title="Edit" class="right-mgn10"><i class="fa fa-pencil"></i></a> <a href="<?= yii::$app->params["defaultDomain"] ?>web/portaluser/delete_user?id='+row.user_id+'" onclick="return onUserDelete();" title="Delete" class="right-mgn10"><i class="fa fa-trash-o color-orange"></i></a>';
          } 
        }
      ];

  var column_options_array = [
	  	{
	  	  "targets":[5],
          "orderable":true,
          "searchable":false

	  	},
        {
          "targets":[0,1,5],
          "orderable":false,
          "searchable":false
        }
      ];


	$('.table1').dataTable( {
	  "pageLength":10,
	  "processing":true,
      "serverSide":true,
	  "columns": columns,
	  "columnDefs":column_options_array,
	   "ajax": 
	      {
	        "url":"<?= yii::$app->params['defaultDomain'] ?>web/portaluser/get_all_users",
	        "type":"POST"
	      },
	   "fnDrawCallback": function (oSettings) {
          $checkedIds = {};
     	},

	   } );

	$('.sorting_asc').removeClass('sorting_asc');


	$checkedIds = {};

}

	function onCheckBoxClicked(id)
	{
		if($('#check_'+id).is(':checked'))
		{
			$checkedIds["check_"+id] = id;
		}
		else
		{
			delete $checkedIds["check_"+id];
		}
	}

	function checkSelected()
	{
		var length = Object.keys($checkedIds).length;
		if(length == 0)
		{
			alert('No users have been selected');
			return false;
		}
		else
		{
			var a = confirm('Are you sure you want to disable the selected '+length + ' user(s)?');
			if(a)
			{
				var blkstr = [];
				$.each($checkedIds, function(idx2,val2) {                    
				  var str = val2;
				  blkstr.push(str);
				});

				$('#to-disable_hidden').val(1);
				$('#ids_hidden').val(blkstr.join(","));

				return true;
			}
			else
			{
				return false;
			}
		}
	}

	function checkSelectedEnable()
	{
		var length = Object.keys($checkedIds).length;
		if(length == 0)
		{
			alert('No users have been selected');
			return false;
		}
		else
		{
			var a = confirm('Are you sure you want to enable the selected '+length + ' user(s)?');
			if(a)
			{
				var blkstr = [];
				$.each($checkedIds, function(idx2,val2) {                    
				  var str = val2;
				  blkstr.push(str);
				});

				$('#to-disable_hidden').val(0);
				$('#ids_hidden').val(blkstr.join(","));

				return true;
			}
			else
			{
				return false;
			}
		}
	}

	function onUserDelete()
	{
		var a = confirm('Are you sure you want to delete this user ? All the data pertaining to the user such as Course Accesses, Ratings, Comments will also be deleted.');
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