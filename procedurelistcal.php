<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 
?>
<?php include_once "autoload.php" ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$procedurelistcal = new procedurelistcal();

// Run the page
$procedurelistcal->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php" ?>
<script src='codebase/dhtmlxscheduler.js?v=5.3.4' type="text/javascript" charset="utf-8"></script>
<script src='codebase/ext/dhtmlxscheduler_timeline.js?v=5.3.4' type="text/javascript" charset="utf-8"></script>
<script src='codebase/ext/dhtmlxscheduler_treetimeline.js?v=5.3.4' type="text/javascript" charset="utf-8"></script>
<script src="codebase/ext/dhtmlxscheduler_units.js?v=5.3.4" type="text/javascript" charset="utf-8"></script>
<link rel='stylesheet' type='text/css' href='codebase/dhtmlxscheduler_material.css?v=5.3.4' />		
<script src="codebase/ext/dhtmlxscheduler_minical.js?v=5.3.4" type="text/javascript" charset="utf-8"></script>		
<script src="codebase/ext/dhtmlxscheduler_limit.js?v=5.3.4" type="text/javascript" charset="utf-8"></script>
<script src="codebase/ext/dhtmlxscheduler_serialize.js?v=5.3.4" type="text/javascript" charset="utf-8"></script>	
<script src='customized/sweetalert2/dist/sweetalert2.js'></script>
<link rel='stylesheet' type='text/css' href='customized/sweetalert2/dist/sweetalert2.css' />


<style type="text/css" >
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow: hidden;
	}	
	.dhx_calendar_click {
		/* background-color: #C2D5FC !important; */
	}
	#my_form {
		position: absolute;
		top: 100px;
		left: 200px;
		z-index: 10001;
		display: none;
		background-color: white;
		border: 2px outset gray;
		padding: 20px;
		font-family: Tahoma;
		font-size: 10pt;
		width: 80%;
	}

	#my_form label {
		width: 200px;
	}
	.red_section {
		background-color: red;
		opacity: 0.25;
		filter: alpha(opacity = 25);
	}

	.yellow_section {
		background-color: #ffa749;
		opacity: 0.25;
		filter: alpha(opacity = 25);
	}

	.green_section {
		background-color: #12be00;
		opacity: 0.25;
		filter: alpha(opacity = 25);
	}

	.blue_section {
		background-color: #2babf5;
		opacity: 0.27;
		filter: alpha(opacity = 27);
	}

	.pink_section {
		background-color: #6a36a5;
		opacity: 0.30;
		filter: alpha(opacity = 30);
	}

	.dark_blue_section {
		background-color: #2ca5a9;
		opacity: 0.40;
		filter: alpha(opacity = 40);
	}

	.dots_section {
		background-image: url(data/imgs/dots.png);
	}

	.fat_lines_section {
		background-image: url(data/imgs/fat_lines.png);
	}

	.medium_lines_section {
		background-image: url(data/imgs/medium_lines.png);
	}

	.small_lines_section {
		background-image: url(data/imgs/small_lines.png);
	}
</style>


<?php

$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$SchedulerProfessionalArrayData = '';
$SchedulerProfessionalArrayData = '{start_date: "2019-12-23 12:00", end_date: "2019-12-23 20:00", text:"Task B-48865", id:"1004"}';
$sql = "SELECT * FROM ganeshkumar_bjhims.view_procedure_registered where ProcedureDateTime between '".$fromdt."' and '".$todate."' ;";
$rs = $dbhelper->LoadRecordset($sql);
$products_arr["data"]=array();
while (!$rs->EOF) {
	$row = &$rs->fields;

	$Referal = "";
	$Notes  = "";
	$MobileNumber = "";
	$WhereDidYouHear = "";
	if($row["PatientID"] != null)
	{
		$WhereDidYouHear = ' ,  PatientID :- ' . $row["PatientID"];
	}
	if($row["mobile_no"] != null)
	{
		$MobileNumber =  ' , MobileNumber :- ' . $row["mobile_no"];
	}
	if($row["Procedure"] != null)
	{
		$Notes =  ' , Procedure :- ' . $row["Procedure"];
	}


	if($row["Doctor"] != null)
	{
		$Referal =  ' , Doctor :- ' . $row["Doctor"];
	}

	$start = $row["ProcedureDateTime"];
	$ToDAtte = date('Y-m-d H:i',strtotime('+4 hour +20 minutes',strtotime($start)));
	
		$product_item=array(
		"id" => $row["id"],
		"start_date" => $row["ProcedureDateTime"] ,

		"end_date" =>  $ToDAtte,   //substr($row["ProcedureDateTime"],0,-8) . "23:00:00" ,
		"text" => $row["first_name"] . $WhereDidYouHear. $MobileNumber. $Notes .  $Referal,
		"details" => $row["DoctorName"] );
		array_push($products_arr["data"], $product_item);


		$SchedulerProfessionalArrayData .=  ',{start_date: "'.$row["ProcedureDateTime"].' ", end_date: "'.$row["ProcedureDateTime"].'", text:"'.$row["first_name"] .'", id:"'.$row["id"].'",  details:"'.$row["id"].'", color:"green"}';


		$rs->MoveNext();
}

$rrr = json_encode($products_arr);

?>

	<script>
		window.addEventListener("DOMContentLoaded", function(){
		//	scheduler.init('scheduler_here',new Date(2018,0,1),"week");
			var onetry = scheduler.addMarkedTimespan({
	days: [0], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
	zones: "fullday",
	css: "green_section"//,
	//type:  "dhx_time_block" //the hardcoded value
});

	var today = new Date();
		scheduler.init('scheduler_here',new Date(today.getFullYear(), today.getMonth(), today.getDate()),"week");
		scheduler.parse(<?php echo json_encode($products_arr); ?>);

		//	scheduler.load("../common/events.json");
		});
	</script>

	
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100vh'>
	<div class="dhx_cal_navline">
		<div class="dhx_cal_prev_button">&nbsp;</div>
		<div class="dhx_cal_next_button">&nbsp;</div>
		<div class="dhx_cal_today_button"></div>
		<div class="dhx_cal_date"></div>
		<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
		<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
		<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
	</div>
	<div class="dhx_cal_header">
	</div>
	<div class="dhx_cal_data">
	</div>
</div>
<?php if (DEBUG_ENABLED) echo GetDebugMessage(); ?>
<?php include_once "footer.php" ?>
<?php
$procedurelistcal->terminate();
?>