<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($view_appointment_scheduler->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_appointment_schedulermaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($view_appointment_scheduler->patientID->Visible) { // patientID ?>
		<tr id="r_patientID">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_patientID" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->patientID->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->patientID->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_patientID" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_patientID">
<span<?php echo $view_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->patientName->Visible) { // patientName ?>
		<tr id="r_patientName">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_patientName" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->patientName->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->patientName->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_patientName" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_patientName">
<span<?php echo $view_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<tr id="r_MobileNumber">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->MobileNumber->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_MobileNumber" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_MobileNumber">
<span<?php echo $view_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->start_time->Visible) { // start_time ?>
		<tr id="r_start_time">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_start_time" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->start_time->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->start_time->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_start_time" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_start_time">
<span<?php echo $view_appointment_scheduler->start_time->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_time->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<tr id="r_Purpose">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Purpose" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->Purpose->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->Purpose->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Purpose" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_Purpose">
<span<?php echo $view_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->patienttype->Visible) { // patienttype ?>
		<tr id="r_patienttype">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_patienttype" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->patienttype->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->patienttype->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_patienttype" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_patienttype">
<span<?php echo $view_appointment_scheduler->patienttype->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->patienttype->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Referal->Visible) { // Referal ?>
		<tr id="r_Referal">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Referal" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->Referal->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->Referal->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Referal" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_Referal">
<span<?php echo $view_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->start_date->Visible) { // start_date ?>
		<tr id="r_start_date">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_start_date" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->start_date->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->start_date->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_start_date" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_start_date">
<span<?php echo $view_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<tr id="r_DoctorName">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_DoctorName" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->DoctorName->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->DoctorName->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_DoctorName" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_DoctorName">
<span<?php echo $view_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($view_appointment_scheduler->Id->Visible) { // Id ?>
		<tr id="r_Id">
			<td class="<?php echo $view_appointment_scheduler->TableLeftColumnClass ?>"><script id="tpc_view_appointment_scheduler_Id" class="view_appointment_schedulermaster" type="text/html"><span><?php echo $view_appointment_scheduler->Id->caption() ?></span></script></td>
			<td<?php echo $view_appointment_scheduler->Id->cellAttributes() ?>>
<script id="tpx_view_appointment_scheduler_Id" class="view_appointment_schedulermaster" type="text/html">
<span id="el_view_appointment_scheduler_Id">
<span<?php echo $view_appointment_scheduler->Id->viewAttributes() ?>>
<?php echo $view_appointment_scheduler->Id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_view_appointment_schedulermaster" class="ew-custom-template"></div>
<script id="tpm_view_appointment_schedulermaster" type="text/html">
<div id="ct_view_appointment_scheduler_master"><style>
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
</style>
<p id="profilePic" hidden>{{include tmpl="#tpx_profilePic"/}}</p>
<?php
$Drid = $_GET['fk_Id'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.appointment_scheduler where id='".$Drid."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$id =  $row["id"];
				$start_date =  $row["start_date"];
				$end_date =  $row["end_date"];
				$patientID =  $row["patientID"];
				$patientName =  $row["patientName"];
				$DoctorID =  $row["DoctorID"];
				$DoctorName =  $row["DoctorName"];
				$DoctorCode =  $row["DoctorCode"];
				$Department =  $row["Department"];				
  	$AppointmentStatus =  $row["AppointmentStatus"];
	$status =  $row["status"];
  	$scheduler_id =  $row["scheduler_id"];
	$text =  $row["text"];
  	$appointment_status =  $row["appointment_status"];
	$PId =  $row["PId"];
  	$MobileNumber =  $row["MobileNumber"];
	$SchEmail =  $row["SchEmail"];
  	$appointment_type =  $row["appointment_type"];
	$Notified =  $row["Notified"];
  	$Purpose =  $row["Purpose"];
  	$Notes =  $row["Notes"];
  	$PatientType =  $row["PatientType"];
	$Referal =  $row["Referal"];				
  	$paymentType =  $row["paymentType"];
	$rs->MoveNext();
}
?>
<div class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
				<h4 class="widget-user-username"><span class="ew-cell"><span>Patient Name </span>&nbsp;<span><?php echo $patientName; ?></span></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell"><span>Patient ID </span>&nbsp;<span><?php echo $patientID; ?></span></span></h6>
			  </div>
			  <div class="widget-user-image">
			   	<img id="profilePicturePatient" class="img-circle elevation-2" src="/uploads/hims/profile-picture.png" alt="User Avatar">  
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell"><span>Mobile Number </span>&nbsp;<span><?php echo $MobileNumber; ?></span></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span>Doctor Name </span>&nbsp;<span><?php echo $DoctorName; ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header"><span>Department </span>&nbsp;<span><?php echo $Department; ?></span></h5>
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
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_appointment_scheduler->Rows) ?> };
ew.applyTemplate("tpd_view_appointment_schedulermaster", "tpm_view_appointment_schedulermaster", "view_appointment_schedulermaster", "<?php echo $view_appointment_scheduler->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_appointment_schedulermaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>