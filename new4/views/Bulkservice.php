<?php

namespace PHPMaker2021\HIMS;

// Page object
$Bulkservice = &$Page;
?>
<style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}

	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}

.form-control:not(textarea) {
	width: -webkit-fill-available;
}

.ew-row .ew-cell {
	margin-right: unset;
}

</style>



<?php

$cid = $_GET["id"] ;
$IVFid = $_GET["id"] ;
$dbhelper = &DbHelper();

$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$IVFidd = $results[0]["patient_id"];


$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["patient_id"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);

if($results2[0]["profilePic"] == "")
{
	$PatientProfilePic = "hims\profile-picture.png";
}else{
	$PatientProfilePic = $results2[0]["profilePic"];
}

if($results1[0]["profilePic"] == "")
{
	$PartnerProfilePic = "hims\profile-picture.png";
}else{
	$PartnerProfilePic = $results1[0]["profilePic"];
}

?>	



MRN No : <?php echo $results[0]["mrnNo"]; ?>
<div class="row">
	<div class="col-md-12">
		<!-- Widget: user widget style 1 -->
		<div class="card card-widget widget-user">
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="widget-user-header bg-warning">
				<h4 class="widget-user-username">
					<span class="ew-cell">
						Patient Id : <?php echo $results2[0]["PatientID"]; ?>
					</span>
				</h4>
				<h4 class="widget-user-username">
					<span class="ew-cell">
						Patient Name : <?php echo $results2[0]["first_name"]; ?>
					</span>
				</h4>
				<h6 class="widget-user-desc">
					<span class="ew-cell">
						Gender : <?php echo $results2[0]["gender"]; ?>
					</span>
				</h6>
				<h6 class="widget-user-desc">
					<span class="ew-cell">
						Blood Group : <?php echo $results2[0]["blood_group"]; ?>
					</span>
				</h6>
			</div>
			<div class="widget-user-image">
				<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar" />
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-sm-4 border-right">
						<div class="description-block">
							<h5 class="description-header">
								<span class="ew-cell">
									Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?>
								</span>
							</h5>

						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 border-right">
						<div class="description-block">
							<h5 class="description-header">
								Mobile : <?php echo $results2[0]["mobile_no"]; ?>
							</h5>

						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4">
						<div class="description-block">
							<h5 class="description-header">
								Email : <?php echo $results2[0]["PEmail"]; ?>
							</h5>

						</div>
						<!-- /.description-block -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
		</div>
		<!-- /.widget-user -->
	</div>

</div>


<?php
	$dbhelper = &DbHelper();
?>


<form id="bulkservice" name="bulkservice" action="bulkserviceinsert.php" method="post">

	<div class="row">
		<div class="col-md-12">
			<div class="form-group row">
				<label class="col-md-2" for="sel1">Select Service List :</label>
				<select class="form-control col-md-3" id="sellist1" name="sellist1">

					<?php

		$sql = "SELECT department FROM ganeshkumar_bjhims.mas_billing_department group by department;";
		$VitalsHistory = $dbhelper->ExecuteRows($sql);
		$VitalsHistoryRowCount = count($VitalsHistory);
		if($VitalsHistoryRowCount > 0)
		{
				for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
					echo ' <option>' .  $VitalsHistory[$x]["department"] .' </option>' ;
				}
		}

		$hhh = $_POST['ID'];

					?>
				</select>
				<button type="button" name="SelectService" id="SelectService" onclick="myScriptSelect()" class="btn btn-success">Select</button>
			</div>
		</div>
	</div>














	
	<input type="hidden" id="TotalCntId" name="TotalCntId" value="0" />

	<input type="hidden" id="id" name="id" value="<?php echo $_GET["id"]; ?>" />
	<input type="hidden" id="fk_id" name="fk_id" value="<?php echo $_GET["fk_id"]; ?>" />
	<input type="hidden" id="fk_patient_id" name="fk_patient_id" value="<?php echo $_GET["fk_patient_id"]; ?>" />
	<input type="hidden" id="fk_mrnNo" name="fk_mrnNo" value="<?php echo $_GET["fk_mrnNo"]; ?>" />







	<br />

	<table id="customers">
		<thead>
			<tr class="ew-table-header">
				<th style="width:250px;" class="text-center">
					<span>Test Name</span>
				</th>
				<th style="width:100px;"  class="text-center">
					<span>Amount</span>
				</th>
				<th style="width:50px;" class="text-center">
					<span>Select</span>
				</th>
				<th style="width:100px;" class="text-center">
					<span>Quantity</span>
				</th>
				<th style="width:100px;" class="text-center">
					<span>Discount %</span>
				</th>
				<th style="width:100px;" class="text-center">
					<span>Sub Total</span>
				</th>
				<th style="width:200px;" class="text-center">
					<span>Description</span>
				</th>
				<th  hidden="" class="text-center">
					<span>service ID</span>
				</th>
				<th hidden="" class="text-center">
					<span>Service Type</span>
				</th>
				<th hidden="" class="text-center">
					<span>Service Department</span>
				</th>
				<th style="width:50px;"  class="text-center">
					<span>sid</span>
				</th>
				<th style="width:50px;" class="text-center ew-table-last-col">
					<span>Item Code</span>
				</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

	<div for="lname" id="BillAmount" name="BillAmount">Total Rs:</div>
 
	<br />
	<br />
	<div class="row">
		<div class="col-md-2">
			<button class="btn btn-block btn-success" type="submit" value="Submit">Save</button>
		</div>
		<div class="col-md-2">
			<button class="btn btn-block btn-default" type="reset" value="Reset" onclick="rrset()">Reset</button>
		</div>
	</div>
		<script>
			function rrset() {
				var BillAmount = document.getElementById("BillAmount");
				BillAmount.innerText = 'Total Rs:    ' ;
			}

		function myScriptSelect(){

	   // alert("hai");
//n
			$("#customers tbody tr").remove();
		var hhhh = document.getElementById("sellist1");
				var user = [{
					'CustomerName': '<?php  echo CurrentUserName();  ?>',
					'ActivityCard': hhhh.value
		}];

	//v
		var jsonString = JSON.stringify(user);
			$.ajax({
				type: "POST",
				url: "ajaxinsert.php?control=selectActivityCard",
				data: { data: jsonString },
				cache: false,
				success: function (data) {
					let jsonObject = JSON.parse(data);
					var json = jsonObject["records"];
					document.getElementById("TotalCntId").value = json.length;
								
					for (var i = 0; i < json.length; i++) {
						var obj = json[i];
						console.log(obj.id);
						var taable = '<tr>' +
							'<td><input type="text" style="text-align:left;" name="SERVICE'+i+'" id="SERVICE'+i+'"  maxlength="45" size="40" value="'+obj.SERVICE+'"></td>' +
							'<td><input type="text" style="text-align:right;"  onchange="AmountChange(this)"  name="Amount'+i+'" id="Amount'+i+'"  maxlength="10" size="8" value="'+obj.Amount+'"></td>' +
							' <td align="center"><input type="checkbox" onclick="checkclicked(this)" id="selectedItem'+i+'" name="selectedItem'+i+'" ></td>' +
							'<td><input type="text" style="text-align:right;" onchange="textInputChange(this)" name="Quantity'+i+'" id="Quantity'+i+'"  maxlength="10" size="8"> </td>' +
							'<td><input type="text" style="text-align:right;" onchange="textInputChange(this)" name="Discount'+i+'" id="Discount'+i+'"  maxlength="14" size="8"></td>' +
							'<td><input type="text" style="text-align:right;" name="SubTotal'+i+'" id="SubTotal'+i+'"  maxlength="14" size="8"></td>' +
							'<td><input type="text" style="text-align:left;" name="Description'+i+'" id="Description'+i+'"  maxlength="45" size="30"></td>' +

							'<td> <input type="text" style="text-align:left;"  name="serviceID' + i + '" id="serviceID' + i + '"   maxlength="45" size="40" value="'+obj.serviceID+'"> </td>' +
							'<td hidden > <input type="text" style="text-align:left;" name="ServiceType'+i+'" id="ServiceType'+i+'"  maxlength="45" size="40" value="'+obj.Service_Type+'"> </td>' +
							'<td hidden  > <input type="text" style="text-align:left;" name="ServiceDepartment'+i+'" id="ServiceDepartment'+i+'"  maxlength="45" size="40" value="'+obj.Service_Department+'"> </td>' +
							'<td hidden  > <input type="text" style="text-align:left;" name="serviceWWWID'+i+'" id="serviceWWWID'+i+'"  maxlength="45" size="40" value="'+obj.serviceID+'"> </td>' +
							'<td > <input type="text" style="text-align:left;"  name="ItemCode'+i+'" id="ItemCode'+i+'"  maxlength="45" size="40" value="'+obj.ItemCode+'"> </td>' +
							'</tr>';
							$("#customers tbody").append(taable);
					  }

				}
			});
		}


	function checkclicked(ggg) {
		//alert(ggg.id);

		var str = ggg.id;
		var res = str.substring(12,str.length);
		//alert(res);
		if (ggg.checked == true) {


			var Amount = document.getElementById("Amount" + res).value;
			document.getElementById("Quantity" + res).value = 1;
			document.getElementById("Discount" + res).value = 0;
			var Quantity = document.getElementById("Quantity" + res).value;
			var Discount = document.getElementById("Discount" + res).value;
			var SubTotal = Number(Amount) * Number(Quantity) * (1 - Number(Discount/100));
			document.getElementById("SubTotal" + res).value = SubTotal;
		} else {

			var SubTotal = document.getElementById("SubTotal" + res).value = '';
			var Quantity = document.getElementById("Quantity" + res).value = '';
			var Discount = document.getElementById("Discount" + res).value = '';
		}  

		addtotalSum();
	 }


function textInputChange(ggg) {

		var str = ggg.id;
		var res = str.substring(8,str.length);
		//alert(res);
		var kkk = document.getElementById("selectedItem" + res)
		if (kkk.checked == true) {


			var Amount = document.getElementById("Amount" + res).value;
			//document.getElementById("Quantity" + res).value = 1;
			//document.getElementById("Discount" + res).value = 0;
			var Quantity = document.getElementById("Quantity" + res).value;
			var Discount = document.getElementById("Discount" + res).value;
			var SubTotal = Number(Amount) * Number(Quantity) * (1 - Number(Discount/100));
			document.getElementById("SubTotal" + res).value = SubTotal;
		} else {

			var SubTotal = document.getElementById("SubTotal" + res).value = '';
			var Quantity = document.getElementById("Quantity" + res).value = '';
			var Discount = document.getElementById("Discount" + res).value = '';
		}
	addtotalSum();
}


function AmountChange(ggg) {

		var str = ggg.id;
		var res = str.substring(6,str.length);
		//alert(res);
		var kkk = document.getElementById("selectedItem" + res)
		if (kkk.checked == true) {


			var Amount = document.getElementById("Amount" + res).value;
			//document.getElementById("Quantity" + res).value = 1;
			//document.getElementById("Discount" + res).value = 0;
			var Quantity = document.getElementById("Quantity" + res).value;
			var Discount = document.getElementById("Discount" + res).value;
			var SubTotal = Number(Amount) * Number(Quantity) * (1 - Number(Discount/100));
			document.getElementById("SubTotal" + res).value = SubTotal;
		} else {

			var SubTotal = document.getElementById("SubTotal" + res).value = '';
			var Quantity = document.getElementById("Quantity" + res).value = '';
			var Discount = document.getElementById("Discount" + res).value = '';
		}
	addtotalSum();
 }

		function addtotalSum()
		{
			var count = document.getElementById("TotalCntId").value;

			var totSum = 0;
				for (var i = 1; i < count; i++) {
					try {
						var amount = document.getElementById("SubTotal" + i );
						if (amount.value != '') {
							totSum = parseInt(totSum) + parseInt(amount.value);
						}
					}catch(err) {

					}
				}
				var BillAmount = document.getElementById("BillAmount");
				BillAmount.innerText = 'Total Rs:    ' + totSum;
		}

		</script>

		<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 0px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
		</style>

</form>

























<?= GetDebugMessage() ?>
