<?php

namespace PHPMaker2021\HIMS;

// Page object
$AppointmentScheduler2 = &$Page;
?>
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



<?php

$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$SchedulerProfessionalArrayData = '';
$SchedulerProfessionalArrayData = '{start_date: "2019-12-23 12:00", end_date: "2019-12-23 20:00", text:"Task B-48865", id:"1004"}';

if($Drid == '')
{

$sql = "SELECT * FROM ganeshkumar_bjhims.appointment_scheduler where start_date between '".$fromdt."' and '".$todate."' and HospID='".HospitalID()."' ;";


}else{

$sql = "SELECT * FROM ganeshkumar_bjhims.appointment_scheduler where start_date between '".$fromdt."' and '".$todate."' and DoctorID='".$Drid."';";

}


$rs = $dbhelper->LoadRecordset($sql);
$products_arr["data"]=array();
while (!$rs->EOF) {
	$row = &$rs->fields;



		$WhereDidYouHear = '';
	$MobileNumber = '';
	$Notes = '';
	if($row["WhereDidYouHear"] != null)
	{
		$WhereDidYouHear = ' ,  Source :- ' . $row["WhereDidYouHear"];
	}
	if($row["MobileNumber"] != null)
	{
		$MobileNumber =  ' , MobileNumber :- ' . $row["MobileNumber"];
	}
	if($row["Notes"] != null)
	{
		$Notes =  ' , Notes :- ' . $row["Notes"];
	}
	if($row["Purpose"] != null)
	{
		$Purpose =  ' , Purpose :- ' . $row["Purpose"];
	}

	if($row["Referal"] != null)
	{
		$Referal =  ' , RefDrName :- ' . $row["Referal"];
	}
	
	

	

	
		$product_item=array(
		"id" => $row["id"],
		"start_date" => $row["start_date"] ,

		"end_date" => $row["end_date"] ,
		"text" => $row["patientName"] .$WhereDidYouHear.$MobileNumber.$Notes.$Purpose.$Referal,
		"details" => $row["DoctorName"] ,
		"color" => $row["paymentType"] );
		array_push($products_arr["data"], $product_item);


		//$SchedulerProfessionalArrayData .=  ',{start_date: "'.$row["start_date"].'", end_date: "'.$row["end_date"].'", text:"'.$row["patientName"] .'", id:"'.$row["id"].'",  details:"'.$row["id"].'", color:"'.$row["paymentType"].'" }';

	$SchedulerProfessionalArrayData .=  ',{start_date: "'.$row["start_date"].'", end_date: "'.$row["end_date"].'", text:"'.$row["patientName"] .'", id:"'.$row["id"].'",  details:"'.$row["id"].'", color:"'.$row["paymentType"].'" }';


		$rs->MoveNext();
}

$rrr = json_encode($products_arr);

$kk = $rrr;


				$DRRCODE =  '';
				$DRRNAME =  '';
				$DRRDEPARTMENT =  '';
				$DRRstart_time =  '';
				$DRRend_time =  '';
				  $DRRslot_time =  '';
				$DRRslot_days =  '';
				$DRRscheduler_id =  '';
				$DRRProfilePic =  '';
				$DRRFees = '';

$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$Drid."';";
$rs = $dbhelper->LoadRecordset($sql);

while (!$rs->EOF) {
	$row = &$rs->fields;

				$DRRCODE =  $row["CODE"];
				$DRRNAME =  $row["NAME"];
				$DRRDEPARTMENT =  $row["DEPARTMENT"];
				$DRRstart_time =  $row["start_time"];
				$DRRend_time =  $row["end_time"];
				  $DRRslot_time =  $row["slot_time"];
				$DRRslot_days =  $row["slot_days"];
				$DRRscheduler_id =  $row["scheduler_id"];
				$DRRProfilePic =  $row["ProfilePic"];
				$DRRFees =  $row["Fees"];



	$rs->MoveNext();
}
?>

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

	.dhx_cal_event div.dhx_footer,
		.dhx_cal_event.past_event div.dhx_footer,
		.dhx_cal_event.event_english div.dhx_footer,
		.dhx_cal_event.event_math div.dhx_footer,
		.dhx_cal_event.event_science div.dhx_footer{
			background-color: transparent !important;
		}
		.dhx_cal_event .dhx_body{
			-webkit-transition: opacity 0.1s;
			transition: opacity 0.1s;
			opacity: 0.7;
		}
		.dhx_cal_event .dhx_title{
			line-height: 12px;
		}
		.dhx_cal_event_line:hover,
		.dhx_cal_event:hover .dhx_body,
		.dhx_cal_event.selected .dhx_body,
		.dhx_cal_event.dhx_cal_select_menu .dhx_body{
			opacity: 1;
		}

		.dhx_cal_event.event_math div,
		.dhx_cal_event_line.event_math{
			background-color: #FF5722 !important;
			border-color: #732d16 !important;
		}

		.dhx_cal_event.dhx_cal_editor.event_math{
			background-color: #FF5722 !important;
		}

		.dhx_cal_event_clear.event_math{
			color:#FF5722 !important;
		}

		.dhx_cal_event.event_science div,
		.dhx_cal_event_line.event_science{
			background-color: #0FC4A7 !important;
			border-color: #698490 !important;
		}

		.dhx_cal_event.dhx_cal_editor.event_science{
			background-color: #0FC4A7 !important;
		}

		.dhx_cal_event_clear.event_science{
			color:#0FC4A7 !important;
		}

		.dhx_cal_event.event_english div,
		.dhx_cal_event_line.event_english{
			background-color: #684f8c !important;
			border-color: #9575CD !important;
		}

		.dhx_cal_event.dhx_cal_editor.event_english{
			background-color: #684f8c !important;
		}

		.dhx_cal_event_clear.event_english{
			color:#B82594 !important;
		}
</style>

<script type="text/javascript" charset="utf-8">
	var prev = null;
	var curr = null;
	var next = null;

function doOnLoad() {



	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const slottime = urlParams.get('slottime')
	var timesstep = 5;
	if (slottime == null) {
		timesstep = 5;
	} else {
		timesstep = slottime;
	}

	

			scheduler.config.details_on_dblclick = true;
			scheduler.config.details_on_create = true;
			scheduler.config.multi_day = true;
			scheduler.config.time_step = timesstep;


						var hhhh = '<?php echo $DRRstart_time; ?>';

							var kkkk = '<?php echo $DRRend_time; ?>';
							
			if(hhhh != '')
			{
						var ff = hhhh.split(":");
						scheduler.config.first_hour = Number(ff[0]);

							var jj = kkkk.split(":");
							var lll = (Number(jj[0]) - Number(ff[0]));
							
						scheduler.config.last_hour = Number(jj[0]);
			}else{
				scheduler.config.first_hour = 7;
				scheduler.config.last_hour = 20;
			}
			

			scheduler.config.hour_date="%h:%i %A";
			scheduler.xy.scale_width = 70;
			var step = timesstep;
			scheduler.config.hour_size_px = (60 / step)* 44; //88;
			// var format = scheduler.date.date_to_str("%H:%i");
			var format = scheduler.date.date_to_str("%h:%i %A");
			scheduler.templates.hour_scale = function(date){
				var step = timesstep;
				var html = "";
				for (var i=0; i<60/step; i++){
					html += "<div style='height:44px;line-height:44px;'>"+format(date)+"</div>";
					date = scheduler.date.add(date, step, "minute");
				}
				return html;
}

   scheduler.templates.event_class=function(start, end, event){
				var css = "";
			//k
			if (event.color == undefined) // if event has subject property then special class should be assigned
			{
				css += "event_english"  //+event.subject;
			}
				else if (event.color == '1') // if event has subject property then special class should be assigned
			{
				css += "event_science"  //+event.subject;
			}
			   else  if (event.color == '2') // if event has subject property then special class should be assigned
			{
				css += "event_math"  //+event.subject;
			}
			   else   // if event has subject property then special class should be assigned
			{
			   // css += "event_"  //+event.subject;
			}

				if(event.id == scheduler.getState().select_id){
					css += " selected";
				}
				return css; // default return

				/*
					Note that it is possible to create more complex checks
					events with the same properties could have different CSS classes depending on the current view:

					var mode = scheduler.getState().mode;
					if(mode == "day"){
						// custom logic here
					}
					else {
						// custom logic here
					}
				*/
			};

var onetry = scheduler.addMarkedTimespan({
	days: [0], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
	zones: "fullday",
	css: "green_section"//,
	//type:  "dhx_time_block" //the hardcoded value
});
		scheduler.addMarkedTimespan({
				start_date: new Date(2018, 11, 18, 12, 30),
				end_date: new Date(2018, 11, 18, 20),
				css: "yellow_section",
				type: "dhx_time_block" // will act as blocked section
				
		});
		var today = new Date();
		scheduler.init('scheduler_here',new Date(today.getFullYear(), today.getMonth(), today.getDate()),"week");
		scheduler.parse(<?php echo json_encode($products_arr); ?>);
		var calendar = scheduler.renderCalendar({
			container:"cal_here", 
			navigation:true,
			handler:function(date){
				scheduler.setCurrentView(date, scheduler.getState().mode);
			}
		});
		scheduler.linkCalendar(calendar);
	scheduler.setCurrentView();

		var onetry = scheduler.deleteMarkedTimespan({
			days: [0,1,2,3,4,5,6], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
			zones: "fullday",
			css: "onecssclass"
		});

	
	}



//function insertParam(key, value)
//{
//	key = encodeURI(key); value = encodeURI(value);
//	var kvp = document.location.search.substr(1).split('&');
//	var i=kvp.length; var x; while(i--)
//	{
//		x = kvp[i].split('=');
//		if (x[0]==key)
//		{
//			x[1] = value;
//			kvp[i] = x.join('=');
//			break;
//		}
//	}
//	if(i<0) {kvp[kvp.length] = [key,value].join('=');}
//	document.location.search = kvp.join('&');           
// }


//	function insertParam(key, value) {


function insertParam(key, value) {
		key = encodeURI(key); value = encodeURI(value);

		var kvp = document.location.search.substr(1).split('&');

		var i = kvp.length; var x; while (i--) {
			x = kvp[i].split('=');

			if (x[0] == key) {
				x[1] = value;
				kvp[i] = x.join('=');
				break;
			}
		}

		if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

		//this will reload the page, it's likely better to store this until finished
		document.location.search = kvp.join('&');
}





  

function DrSelected(drid) {
		var ul = document.getElementById("drULList");
		var liNodes = [];
		for (var i = 0; i < ul.childNodes.length; i++) {
			try {
					ul.childNodes[i].classList.remove("bg-success");
			}
			catch(err) {
					// document.getElementById("demo").innerHTML = err.message;
			}
		}

		drid.classList.add("bg-success");

		var doctorname = document.getElementById("doctorname"+ drid.id);
		var doctorDept = document.getElementById("doctorDept" + drid.id);

		var start_time = document.getElementById("start_time"+ drid.id);
		var end_time = document.getElementById("end_time" + drid.id);
		var slot_time = document.getElementById("slot_time"+ drid.id);
		var slot_days = document.getElementById("slot_days" + drid.id);

	//	insertParam('Drid', drid.id);

		scheduler.clearAll();
		var onetry = scheduler.deleteMarkedTimespan({
			days: [0,1,2,3,4,5,6], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
			zones: "fullday",
			css: "onecssclass"
		});

		scheduler.updateView();
		var kkl = slot_days.innerText;
		var myStringArray = kkl.split(",");
		var arrayLength = myStringArray.length;
		for (var i = 0; i < arrayLength; i++) {

			const numbers = [kkl];
			const doubled = numbers.map(n => n * 2);
			var onetry = scheduler.addMarkedTimespan({
					days: myStringArray[i], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
					zones: "fullday",
					css: "red_section",
					type: "dhx_time_block" //the hardcoded value
				});
			}
			scheduler.updateView();

			var slotsttep = 5;
			if (slot_time.innerText == '') {
					slotsttep = 5
			} else { slotsttep = slot_time.innerText; }

			scheduler.config.time_step = slotsttep;
			scheduler.config.hour_date="%h:%i %A";

			var hhhh = '<?php echo $DRRstart_time; ?>';
			if(hhhh != '')
			{
						scheduler.config.first_hour = hhhh;
						scheduler.config.last_hour = 18;
			}
						
			
			scheduler.xy.scale_width = 70;
			var step = slotsttep;
			scheduler.config.hour_size_px = (60 / step)* 44; //88;

			var format = scheduler.date.date_to_str("%h:%i %A");
			scheduler.templates.hour_scale = function(date){
				var step = slotsttep;
				var html = "";
					for (var i=0; i<60/step; i++){
						html += "<div style='height:44px;line-height:44px;'>"+format(date)+"</div>";
						date = scheduler.date.add(date, step, "minute");
					}
				return html;
				}
				scheduler.updateView();
				scheduler.init('scheduler_here',new Date(2018, 11, 18),"week");
				scheduler.load("../common/events.json")


	var parammmm = drid.id + '&slottime=' + slot_time.innerText;

		  //  insertParam('Drid', drid.id);
//	insertParam('Drid', parammmm);

  // insertParam2('Drid', drid.id,'slottime', slot_time.innerText);

//	insertParam('Drid', drid.id,'slottime', slot_time.innerText);

 var sa = document.location.href;
	var s = document.location.search;

	var kvp = document.location.search.substr(1).split('&');

	var tttyy = slot_time.innerText;
if(tttyy== '')
{
 tttyy = 5;
}

if(tttyy== null)
{
 tttyy = 5;
}
	
	var url = new URL(document.location.href);
	url.searchParams.set('Drid', drid.id);
	url.searchParams.set('slottime', tttyy);

	document.location = url.toString();
}




			var html = function(id) { return document.getElementById(id); }; //just a helper


	var Drid = '<?php echo $Drid; ?>';
	var DRRCODE = '<?php echo $DRRCODE; ?>';
	var DRRNAME = '<?php echo $DRRNAME; ?>';
	var DRRDEPARTMENT = '<?php echo $DRRDEPARTMENT; ?>';
	var DRRstart_time = '<?php echo $DRRstart_time; ?>';
	var DRRend_time = '<?php echo $DRRend_time; ?>';
	var DRRslot_days = '<?php echo $DRRslot_days; ?>';
	var DRRscheduler_id = '<?php echo $DRRscheduler_id; ?>';
	var DRRProfilePic = '<?php echo $DRRProfilePic; ?>';
	var DRRFees = '<?php echo $DRRFees; ?>';

	
scheduler.showLightbox = function(id) {
			var ev = scheduler.getEvent(id);
			scheduler.startLightbox(id, html("my_form"));
			$("#my_form").css({ top: '10px' });
		//	$('#content').load('_appointment_scheduleradd.php?' + $.param ({'startdate' : formatDate(ev.start_date) , 'enddate' : formatDate(ev.end_date) , 'evtext' : ev.text}));

	var sttart = ev.start_date;
	var formatFunc = scheduler.date.date_to_str("%Y-%m-%d %H:%i");
	// var formatFunc = scheduler.date.date_to_str("%d/%m/%Y %H:%i:%s");
	var start_format_date = formatFunc(sttart); 

	 var endart = ev.end_date;
	//var formatFunc = scheduler.date.date_to_str("%Y-%m-%d %H:%i");
   //  var formatFunc = scheduler.date.date_to_str("%d/%m/%Y %H:%i:%s");
	var end_format_date = formatFunc(endart); 


	//alert(sttart);
	  //  alert(format_date);
	//	$('#content').load('_appointment_scheduleradd.php?' + $.param ({'startdate' : start_format_date , 'enddate' : end_format_date , 'evtext' : ev.text}));
	$('#content').load('_appointment_scheduleradd.php?' + $.param ({'startdate' : start_format_date , 'enddate' : end_format_date , 'evtext' : ev.text ,'Drid' : Drid ,'DRRCODE' : DRRCODE ,'DRRNAME' : DRRNAME ,'DRRDEPARTMENT' : DRRDEPARTMENT }));

};


scheduler.edit= function (id) {
		//alert(id);
				scheduler.startLightbox(id, html("my_form"));
			$("#my_form").css({ top: '10px' });
	//		Swal.fire({
  //title: "<i>Title</i>",
	//			html: ' <div id="mydiv"> <iframe id="frame" src="" width="100%" height="300">  </iframe></div>',
   //   width: '800px',
  //confirmButtonText: "V <u>redu</u>",
//			});

			//	$("#frame").attr("src", '_appointment_scheduleredit.php?' + $.param ({'id' : id  }));
				$('#content').load('_appointment_scheduleredit.php?' + $.param ({'id' : id  }));

	};
		
function save_form() {
			var ev = scheduler.getEvent(scheduler.getState().lightbox_id);
			ev.text = html("description").value;
			ev.custom1 = html("custom1").value;
			ev.custom2 = html("custom2").value;
			scheduler.endLightbox(true, html("my_form"));
		}
		function close_form() {
			scheduler.endLightbox(false, html("my_form"));
		}

		function delete_event() {
			var event_id = scheduler.getState().lightbox_id;
			scheduler.endLightbox(false, html("my_form"));
			scheduler.deleteEvent(event_id);
}


function formatDate(date) {
		var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();
	if (month.length < 2)
		month = '0' + month;
	if (day.length < 2)
		day = '0' + day;
	return [year, month, day].join('-');
}



	function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("drULList");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
	a = li[i].getElementsByTagName("span")[1];
	txtValue = a.textContent || a.innerText;
	if (txtValue.toUpperCase().indexOf(filter) > -1) {
	  li[i].style.display = "";
	} else {
	  li[i].style.display = "none";
	}
  }
}
</script>

<style>
	#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
</style>


<body onload="doOnLoad(this);" id="body">  
	<div id="my_form">
		<div class="col-12">
			<div class="card card-warning card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active show" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Appointment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Reminder</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Block Calendar</a>
						</li>						
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

							<!--//////////////////////////////////////-->
													  <div id="content"></div>
							<!--///////////////////////////////////////////-->

						</div>
						<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
							<div id="content1"></div>
						</div>
						<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
							<label for="description">Event text </label>
							<input type="text" name="description" value="" id="description" />
							<br />
							<label for="custom1">Custom 1 </label>
							<input type="text" name="custom1" value="" id="custom1" />
							<br />
							<label for="custom2">Custom 2 </label>
							<input type="text" name="custom2" value="" id="custom2" />
							<br />
							<br />
							<input type="button" name="save" value="Save" id="save" style='width:100px;' onclick="save_form()" />
							<input type="button" name="close" value="Close" id="close" style='width:100px;' onclick="close_form()" />
							<input type="button" name="delete" value="Delete" id="delete" style='width:100px;' onclick="delete_event()" /> 
							<div id="content2"></div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>

	<div class="col-md-3" style='float: left; padding:10px;'>
		<div id="cal_here" style='width:250px;'></div>
		<br />
				<div class="card direct-chat direct-chat-warning">				
				  <!-- /.card-header -->
				  <div class="card-body">
				    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Dr names.." />
					  <ul id="drULList" class="products-list product-list-in-card pl-2 pr-2" style="height: 400px; overflow: auto">								  
				<?php
					  $project_db = &DbHelper();
					  //loop throught all rows if any
					  $all_rows = $project_db->LoadRecordset("SELECT * FROM ganeshkumar_bjhims.doctors where Status='1' and HospID='".HospitalID()."';");
					  while (!$all_rows->EOF) {
						  $row = &$all_rows->fields;
						$Aid = $row["id"];

						$sqll = "SELECT count(*) as count FROM ganeshkumar_bjhims.appointment_scheduler  WHERE DATE(`start_date`) = CURDATE() and DoctorID = '".$Aid."';";
						$resultsA = $dbhelper->ExecuteRows($sqll);
						$Countt = $resultsA[0]["count"];

						
						echo '<li onclick="DrSelected(this)" id="'.$Aid.'" class="item">';
							  //read info
						  $AnoNome = $row["NAME"];
						  $NomeItemProgramacao = $row["DEPARTMENT"];
						  $ProfilePic = $row["ProfilePic"];
						  $Fees = $row["Fees"];
						  $CODE = $row["CODE"];
						  $start_time = $row["start_time"];
						  $end_time = $row["end_time"];
						  $slot_time = $row["slot_time"];
						  $slot_days = $row["slot_days"];
						  $scheduler_id = $row["scheduler_id"];
						  if($ProfilePic == null)
						  {
							  $ProfilePic = 'https://adminlte.io/themes/dev/AdminLTE/dist/img/default-150x150.png';
						  }
						  if($Fees == null)
						  {
							  $Fees = '400';
						  }
							 // echo "<br>".$AnoNome." - ".$NomeItemProgramacao;

								echo '<div class="product-img">';
								echo '<img src="'.$ProfilePic.'" alt="Product Image" class="img-size-50">';
								echo '</div>';
								echo '<div class="product-info">';
								echo '<a href="javascript:void(0)" id="doctorDept'.$Aid.'" class="product-title">'.$NomeItemProgramacao;
								echo '<span class="badge badge-warning float-right">&#8377 '.$Fees. ' Count: ' .$Countt.'</span></a>';
								echo '</br><span id="doctorname'.$Aid.'" class="product-title">';
								echo $AnoNome;
								echo '</span>';
								echo '</div>';
								echo '<div id="start_time'.$Aid.'" style="display: none;">'.$start_time.'</div>';
								echo '<div id="end_time'.$Aid.'" style="display: none;">'.$end_time.'</div>';
								echo '<div id="slot_time'.$Aid.'" style="display: none;">'.$slot_time.'</div>';
								echo '<div id="slot_days'.$Aid.'" style="display: none;">'.$slot_days.'</div>';

						  echo '</li>';
						  $all_rows->MoveNext();
					  }
				?>					 					  
					  </ul>
				  </div>			   
				</div>			  
	</div>
	<div id="scheduler_here" class="dhx_cal_container col-md-9" style='width:auto; height:100vh;'>       
		<div class="dhx_cal_navline">
			<a class="bg-success color-palette" id="DrNameeee"><?php  echo $DRRNAME . ' - '. $DRRDEPARTMENT ;  ?></a>
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
</body>

<script>
	var drid = document.getElementById("<?php  echo $Drid;  ?>");
	var kk = 400;
	var ul = document.getElementById("drULList");
	var ll = ul.childNodes.length;
	drid.classList.add("bg-success");
	drid.classList.add("active");
	var jj = 400 / ll;
	var tt = drid.id;  //"<?php  echo $Drid;  ?>";
	var ttA = '.' + drid.id;   
	var oo = Math.round(jj * tt);
		ul.scrollTop = oo;;

			scheduler.clearAll();
		var onetry = scheduler.deleteMarkedTimespan({
			days: [0,1,2,3,4,5,6], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
			zones: "fullday",
			css: "onecssclass"
		});
			//scheduler.updateView();
	var kkl = "<?php  echo $DRRslot_days; ?>" ;// slot_days.innerText;
		var myStringArray = kkl.split(",");
		var arrayLength = myStringArray.length;
		for (var i = 0; i < arrayLength; i++) {

			const numbers = [kkl];
			const doubled = numbers.map(n => n * 2);
			var onetry = scheduler.addMarkedTimespan({
					days: myStringArray[i], // eg. Tue 2013-12-17, Wed 2013-12-18 and Thu 2013-12-19
					zones: "fullday",
					css: "red_section",
					type: "dhx_time_block" //the hardcoded value
				});
			}
		  //  scheduler.updateView();
   // DrSelected(drid);
</script>















































<?= GetDebugMessage() ?>
