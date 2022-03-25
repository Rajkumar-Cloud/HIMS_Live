<?php

namespace PHPMaker2021\HIMS;

// Page object
$Dashboard2 = &$Page;
?>





<?php

$cid = $_GET["id"] ;
$IVFid = $_POST["id"] ;
$dbhelper = &DbHelper();

$sql = "SELECT count(*) as Count FROM ganeshkumar_bjhims.doctors where Status=1 and HospID = '".HospitalID()."'  ; ";
$results = $dbhelper->ExecuteRows($sql);
$DRCount = $results[0]["Count"];



$sql = "SELECT count(PatientId) as PatCount FROM ganeshkumar_bjhims.billing_voucher
where BillType = 'OP' and createddatetime = curdate() and HospID='".HospitalID()."'  ; ";
$results = $dbhelper->ExecuteRows($sql);
$PatCount = $results[0]["PatCount"];





$sql = "SELECT Count(PatientID) as IPCount FROM ganeshkumar_bjhims.ip_admission where BillClosing is null and HospID = '".HospitalID()."'  ; ";
$results = $dbhelper->ExecuteRows($sql);
$IPCount = $results[0]["IPCount"];





?>


<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3><?php echo $DRCount; ?></h3>

				<p>Active Doctors</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-md" aria-hidden="true"></i>
			</div>
			<a href="#" class="small-box-footer">
			
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>
					<?php echo $PatCount; ?>
				  
				</h3>

				<p>Active OP Patients</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">
				
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
	<?php echo $IPCount; ?>
				</h3>

				<p>Active IP Patients</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">
				
				<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->

	<!-- ./col -->
</div>





<?= GetDebugMessage() ?>
