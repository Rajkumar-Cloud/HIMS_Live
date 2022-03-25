<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$activitycard = new activitycard();

// Run the page
$activitycard->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>





<?php

$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.view_patient_vitals;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;

		$TOTALASSET = $row[TOTALASSET];
		$AMC = $row[AMC];
	
$rs->MoveNext();
}

?>

<script>
	function myFunction() {
		//alert("hhhhhhhaaaaiiiii");
		var tableInsert = document.getElementById("tableInsert");

			var hhhh = document.getElementById("ActivityCardSelect");
		var user = [{	
		'ActivityCard' : hhhh.value
		
		}];
		var jsonString = JSON.stringify(user);

		$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectActivityCard",
				data: { data: jsonString },
				cache: false,
					success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					for(var i = 0; i < json.length; i++) {
						var obj = json[i];
						console.log(obj.id);

						var tr = document.createElement('TR'); // this should be inside the first loop
						tableInsert.appendChild(tr);

						var Activity = document.createElement("LABEL");
						Activity.id = "Activity"+(i+1);
						Activity.innerHTML  = obj.Activity;
						var td = document.createElement('TD')
					   
						tr.appendChild(td) // this should be tr.appendChild(td)
						 td.appendChild(Activity);

						var Type = document.createElement("LABEL");
						Type.id = "Type" + (i + 1);
						Type.innerHTML  = obj.Type + "&nbsp&nbsp&nbsp&nbsp";
						var td = document.createElement('TD')
						td.appendChild(Type);
						tr.appendChild(td) // this should be tr.appendChild(td)

						 var Selected = document.createElement("input");
						Selected.id = "Selected" + (i + 1);
						Selected.type = "checkbox";
						Selected.innerHTML  = "&nbsp&nbsp";
						var td = document.createElement('TD')
						td.appendChild(Selected);
						tr.appendChild(td) // this should be tr.appendChild(td)

						 var Units = document.createElement("input");
						Units.id = "Units" + (i + 1);
						 Units.type = "number";
						var td = document.createElement('TD')

						td.appendChild(Units);
						tr.appendChild(td) // this should be tr.appendChild(td)

						 var Amount = document.createElement("input");
						Amount.id = "Amount" + (i + 1);
						  Amount.type = "number";
						var td = document.createElement('TD')

						td.appendChild(Amount);
						tr.appendChild(td) // this should be 

						tr.appendChild(td)


						
					  }

					//alert(data + "Saved Sucessfully...........");
					//swal({ text: "Saved Sucessfully......", icon: "success", });
				   // Receiptreset();
				  //  document.getElementById("VoucherAmt0").focus();

				}
			});
	}
</script>

<div class="card card-default color-palette-box">
		  <div class="card-header">
			  <div class="row">
					<h3 class="card-title">
					  <i class="fas fa-tag"></i>
					  Activity Card &nbsp; 
					</h3>
					 <select id="ActivityCardSelect">
						<option value="OT(Major)">OT(Major)</option>
  				        <option value="Labour Room">Labour Room</option>
  				        <option value="Baby">Baby</option>
  				        <option value="OT(Minor)">OT(Minor)</option>
  			        </select> &nbsp; 
				  <button class="col-md-2 btn btn-block bg-success" onclick="myFunction()">Click me</button>
			 </div>
		  </div>
		<div class="card-body">
			<div class="col-12">


				<div id="tableInsert" ></div>

			  
			</div>

			 

			<!-- /.row -->
		</div>
		  <!-- /.card-body -->
</div>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$activitycard->terminate();
?>