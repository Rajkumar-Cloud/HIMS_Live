<?php

namespace PHPMaker2021\HIMS;

// Page object
$Ipbulkserviceinsert = &$Page;
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
$IVFid = $_POST["id"] ;
$dbhelper = &DbHelper();

//$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$IVFid."'; ";
$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where patient_id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$IVFidd = $results[0]["id"];


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

$VitalsHistoryRowCount  = $_POST["TotalCntId"];

$dbhelper = &DbHelper();


if($VitalsHistoryRowCount > 0)
{
	for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {

		$Service = $_POST["SERVICE" .$x];
		$Amount = $_POST["Amount" .$x];
		$selectedItem = $_POST["selectedItem" .$x];
		$Quantity = $_POST["Quantity" .$x];
		$Discount = $_POST["Discount" .$x];
		$SubTotal = $_POST["SubTotal" .$x];

		$Description = $_POST["Description" .$x];
		$serviceID = $_POST["serviceID" .$x];
		$ServiceType = $_POST["ServiceType" .$x];
		$ServiceDepartment = $_POST["ServiceDepartment" .$x];
		$serviceWWWID = $_POST["serviceWWWID" .$x];
		$ItemCode = $_POST["ItemCode" .$x];

		if($selectedItem == 'on')
		{
			$sql = "SELECT department FROM ganeshkumar_bjhims.mas_billing_department group by department;";

			$sql = "INSERT INTO `ganeshkumar_bjhims`.`patient_services`
(`Reception`, `PatID`, `mrnno`, `PatientName`, `Age`,
`Gender`, `Services`, `amount`, `Quantity`, `Discount`,
`SubTotal`, `description`, `createdby`, `createddatetime`,
`HospID`, `sid`, `ItemCode`, `TestSubCd`, `DEptCd`,
`PatientId`, `Mobile`, `serviceID`, `Service_Type`, `Service_Department`
) VALUES
('".$results[0]["id"]."', '".$results[0]["patient_id"]."', '".$results[0]["mrnNo"]."', '".$results2[0]["first_name"]."', '".AgeCalculationb($results2[0]["dob"])."',
'".$results2[0]["gender"]."', '".$Service."', '".$Amount."', '".$Quantity."', '".$Discount."',
'".$SubTotal."', '".$Description."', '".GetUserName()."', CURDATE(),
'".HospitalID()."', '".$serviceID."', '".$ItemCode."', '".$ServiceType."', '".$ServiceDepartment."',
'".$results2[0]["PatientID"]."', '".$results2[0]["mobile_no"]."', '".$serviceID."', '".$ServiceType."', '".$ServiceDepartment."'
);";
			$VitalsHistory = $dbhelper->ExecuteRows($sql);
		}
	}
}






?>


<div class="card">
	<div class="card-header">
		<h3 class="card-title">Added All Services</h3>
	</div>
	<div class="card-body p-0">
		<?php
		$sql = "SELECT Services,	amount,	Quantity,	Discount,	SubTotal FROM ganeshkumar_bjhims.patient_services where Reception='".$IVFid."' and Vid is null;";
		echo $dbhelper->ExecuteHtml($sql, array("fieldcaption" => TRUE, "tablename" => array("products", "categories")));
		?>
	</div>
</div>





































<?= GetDebugMessage() ?>
