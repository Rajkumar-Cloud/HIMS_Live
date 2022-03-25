<?php
namespace PHPMaker2019\HIMS;
?>
<?php if ($ivf->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_ivfmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
	<tbody>
<?php if ($ivf->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_id" class="ivfmaster" type="text/html"><span><?php echo $ivf->id->caption() ?></span></script></td>
			<td<?php echo $ivf->id->cellAttributes() ?>>
<script id="tpx_ivf_id" class="ivfmaster" type="text/html">
<span id="el_ivf_id">
<span<?php echo $ivf->id->viewAttributes() ?>>
<?php echo $ivf->id->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->Male->Visible) { // Male ?>
		<tr id="r_Male">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_Male" class="ivfmaster" type="text/html"><span><?php echo $ivf->Male->caption() ?></span></script></td>
			<td<?php echo $ivf->Male->cellAttributes() ?>>
<script id="tpx_ivf_Male" class="ivfmaster" type="text/html">
<span id="el_ivf_Male">
<span<?php echo $ivf->Male->viewAttributes() ?>>
<?php echo $ivf->Male->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->Female->Visible) { // Female ?>
		<tr id="r_Female">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_Female" class="ivfmaster" type="text/html"><span><?php echo $ivf->Female->caption() ?></span></script></td>
			<td<?php echo $ivf->Female->cellAttributes() ?>>
<script id="tpx_ivf_Female" class="ivfmaster" type="text/html">
<span id="el_ivf_Female">
<span<?php echo $ivf->Female->viewAttributes() ?>>
<?php echo $ivf->Female->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->status->Visible) { // status ?>
		<tr id="r_status">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_status" class="ivfmaster" type="text/html"><span><?php echo $ivf->status->caption() ?></span></script></td>
			<td<?php echo $ivf->status->cellAttributes() ?>>
<script id="tpx_ivf_status" class="ivfmaster" type="text/html">
<span id="el_ivf_status">
<span<?php echo $ivf->status->viewAttributes() ?>>
<?php echo $ivf->status->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->malepropic->Visible) { // malepropic ?>
		<tr id="r_malepropic">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_malepropic" class="ivfmaster" type="text/html"><span><?php echo $ivf->malepropic->caption() ?></span></script></td>
			<td<?php echo $ivf->malepropic->cellAttributes() ?>>
<script id="tpx_ivf_malepropic" class="ivfmaster" type="text/html">
<span id="el_ivf_malepropic">
<span>
<?php echo GetFileViewTag($ivf->malepropic, $ivf->malepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->femalepropic->Visible) { // femalepropic ?>
		<tr id="r_femalepropic">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_femalepropic" class="ivfmaster" type="text/html"><span><?php echo $ivf->femalepropic->caption() ?></span></script></td>
			<td<?php echo $ivf->femalepropic->cellAttributes() ?>>
<script id="tpx_ivf_femalepropic" class="ivfmaster" type="text/html">
<span id="el_ivf_femalepropic">
<span>
<?php echo GetFileViewTag($ivf->femalepropic, $ivf->femalepropic->getViewValue()) ?>
</span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->HusbandEducation->Visible) { // HusbandEducation ?>
		<tr id="r_HusbandEducation">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_HusbandEducation" class="ivfmaster" type="text/html"><span><?php echo $ivf->HusbandEducation->caption() ?></span></script></td>
			<td<?php echo $ivf->HusbandEducation->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEducation" class="ivfmaster" type="text/html">
<span id="el_ivf_HusbandEducation">
<span<?php echo $ivf->HusbandEducation->viewAttributes() ?>>
<?php echo $ivf->HusbandEducation->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->WifeEducation->Visible) { // WifeEducation ?>
		<tr id="r_WifeEducation">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_WifeEducation" class="ivfmaster" type="text/html"><span><?php echo $ivf->WifeEducation->caption() ?></span></script></td>
			<td<?php echo $ivf->WifeEducation->cellAttributes() ?>>
<script id="tpx_ivf_WifeEducation" class="ivfmaster" type="text/html">
<span id="el_ivf_WifeEducation">
<span<?php echo $ivf->WifeEducation->viewAttributes() ?>>
<?php echo $ivf->WifeEducation->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
		<tr id="r_HusbandWorkHours">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_HusbandWorkHours" class="ivfmaster" type="text/html"><span><?php echo $ivf->HusbandWorkHours->caption() ?></span></script></td>
			<td<?php echo $ivf->HusbandWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_HusbandWorkHours" class="ivfmaster" type="text/html">
<span id="el_ivf_HusbandWorkHours">
<span<?php echo $ivf->HusbandWorkHours->viewAttributes() ?>>
<?php echo $ivf->HusbandWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
		<tr id="r_WifeWorkHours">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_WifeWorkHours" class="ivfmaster" type="text/html"><span><?php echo $ivf->WifeWorkHours->caption() ?></span></script></td>
			<td<?php echo $ivf->WifeWorkHours->cellAttributes() ?>>
<script id="tpx_ivf_WifeWorkHours" class="ivfmaster" type="text/html">
<span id="el_ivf_WifeWorkHours">
<span<?php echo $ivf->WifeWorkHours->viewAttributes() ?>>
<?php echo $ivf->WifeWorkHours->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->PatientLanguage->Visible) { // PatientLanguage ?>
		<tr id="r_PatientLanguage">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_PatientLanguage" class="ivfmaster" type="text/html"><span><?php echo $ivf->PatientLanguage->caption() ?></span></script></td>
			<td<?php echo $ivf->PatientLanguage->cellAttributes() ?>>
<script id="tpx_ivf_PatientLanguage" class="ivfmaster" type="text/html">
<span id="el_ivf_PatientLanguage">
<span<?php echo $ivf->PatientLanguage->viewAttributes() ?>>
<?php echo $ivf->PatientLanguage->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->ReferedBy->Visible) { // ReferedBy ?>
		<tr id="r_ReferedBy">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_ReferedBy" class="ivfmaster" type="text/html"><span><?php echo $ivf->ReferedBy->caption() ?></span></script></td>
			<td<?php echo $ivf->ReferedBy->cellAttributes() ?>>
<script id="tpx_ivf_ReferedBy" class="ivfmaster" type="text/html">
<span id="el_ivf_ReferedBy">
<span<?php echo $ivf->ReferedBy->viewAttributes() ?>>
<?php echo $ivf->ReferedBy->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->ReferPhNo->Visible) { // ReferPhNo ?>
		<tr id="r_ReferPhNo">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_ReferPhNo" class="ivfmaster" type="text/html"><span><?php echo $ivf->ReferPhNo->caption() ?></span></script></td>
			<td<?php echo $ivf->ReferPhNo->cellAttributes() ?>>
<script id="tpx_ivf_ReferPhNo" class="ivfmaster" type="text/html">
<span id="el_ivf_ReferPhNo">
<span<?php echo $ivf->ReferPhNo->viewAttributes() ?>>
<?php echo $ivf->ReferPhNo->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->WifeCell->Visible) { // WifeCell ?>
		<tr id="r_WifeCell">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_WifeCell" class="ivfmaster" type="text/html"><span><?php echo $ivf->WifeCell->caption() ?></span></script></td>
			<td<?php echo $ivf->WifeCell->cellAttributes() ?>>
<script id="tpx_ivf_WifeCell" class="ivfmaster" type="text/html">
<span id="el_ivf_WifeCell">
<span<?php echo $ivf->WifeCell->viewAttributes() ?>>
<?php echo $ivf->WifeCell->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->HusbandCell->Visible) { // HusbandCell ?>
		<tr id="r_HusbandCell">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_HusbandCell" class="ivfmaster" type="text/html"><span><?php echo $ivf->HusbandCell->caption() ?></span></script></td>
			<td<?php echo $ivf->HusbandCell->cellAttributes() ?>>
<script id="tpx_ivf_HusbandCell" class="ivfmaster" type="text/html">
<span id="el_ivf_HusbandCell">
<span<?php echo $ivf->HusbandCell->viewAttributes() ?>>
<?php echo $ivf->HusbandCell->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->WifeEmail->Visible) { // WifeEmail ?>
		<tr id="r_WifeEmail">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_WifeEmail" class="ivfmaster" type="text/html"><span><?php echo $ivf->WifeEmail->caption() ?></span></script></td>
			<td<?php echo $ivf->WifeEmail->cellAttributes() ?>>
<script id="tpx_ivf_WifeEmail" class="ivfmaster" type="text/html">
<span id="el_ivf_WifeEmail">
<span<?php echo $ivf->WifeEmail->viewAttributes() ?>>
<?php echo $ivf->WifeEmail->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->HusbandEmail->Visible) { // HusbandEmail ?>
		<tr id="r_HusbandEmail">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_HusbandEmail" class="ivfmaster" type="text/html"><span><?php echo $ivf->HusbandEmail->caption() ?></span></script></td>
			<td<?php echo $ivf->HusbandEmail->cellAttributes() ?>>
<script id="tpx_ivf_HusbandEmail" class="ivfmaster" type="text/html">
<span id="el_ivf_HusbandEmail">
<span<?php echo $ivf->HusbandEmail->viewAttributes() ?>>
<?php echo $ivf->HusbandEmail->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<tr id="r_ARTCYCLE">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_ARTCYCLE" class="ivfmaster" type="text/html"><span><?php echo $ivf->ARTCYCLE->caption() ?></span></script></td>
			<td<?php echo $ivf->ARTCYCLE->cellAttributes() ?>>
<script id="tpx_ivf_ARTCYCLE" class="ivfmaster" type="text/html">
<span id="el_ivf_ARTCYCLE">
<span<?php echo $ivf->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf->ARTCYCLE->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->RESULT->Visible) { // RESULT ?>
		<tr id="r_RESULT">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_RESULT" class="ivfmaster" type="text/html"><span><?php echo $ivf->RESULT->caption() ?></span></script></td>
			<td<?php echo $ivf->RESULT->cellAttributes() ?>>
<script id="tpx_ivf_RESULT" class="ivfmaster" type="text/html">
<span id="el_ivf_RESULT">
<span<?php echo $ivf->RESULT->viewAttributes() ?>>
<?php echo $ivf->RESULT->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->CoupleID->Visible) { // CoupleID ?>
		<tr id="r_CoupleID">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_CoupleID" class="ivfmaster" type="text/html"><span><?php echo $ivf->CoupleID->caption() ?></span></script></td>
			<td<?php echo $ivf->CoupleID->cellAttributes() ?>>
<script id="tpx_ivf_CoupleID" class="ivfmaster" type="text/html">
<span id="el_ivf_CoupleID">
<span<?php echo $ivf->CoupleID->viewAttributes() ?>>
<?php echo $ivf->CoupleID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->HospID->Visible) { // HospID ?>
		<tr id="r_HospID">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_HospID" class="ivfmaster" type="text/html"><span><?php echo $ivf->HospID->caption() ?></span></script></td>
			<td<?php echo $ivf->HospID->cellAttributes() ?>>
<script id="tpx_ivf_HospID" class="ivfmaster" type="text/html">
<span id="el_ivf_HospID">
<span<?php echo $ivf->HospID->viewAttributes() ?>>
<?php echo $ivf->HospID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->PatientName->Visible) { // PatientName ?>
		<tr id="r_PatientName">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_PatientName" class="ivfmaster" type="text/html"><span><?php echo $ivf->PatientName->caption() ?></span></script></td>
			<td<?php echo $ivf->PatientName->cellAttributes() ?>>
<script id="tpx_ivf_PatientName" class="ivfmaster" type="text/html">
<span id="el_ivf_PatientName">
<span<?php echo $ivf->PatientName->viewAttributes() ?>>
<?php echo $ivf->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->PatientID->Visible) { // PatientID ?>
		<tr id="r_PatientID">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_PatientID" class="ivfmaster" type="text/html"><span><?php echo $ivf->PatientID->caption() ?></span></script></td>
			<td<?php echo $ivf->PatientID->cellAttributes() ?>>
<script id="tpx_ivf_PatientID" class="ivfmaster" type="text/html">
<span id="el_ivf_PatientID">
<span<?php echo $ivf->PatientID->viewAttributes() ?>>
<?php echo $ivf->PatientID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->PartnerName->Visible) { // PartnerName ?>
		<tr id="r_PartnerName">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_PartnerName" class="ivfmaster" type="text/html"><span><?php echo $ivf->PartnerName->caption() ?></span></script></td>
			<td<?php echo $ivf->PartnerName->cellAttributes() ?>>
<script id="tpx_ivf_PartnerName" class="ivfmaster" type="text/html">
<span id="el_ivf_PartnerName">
<span<?php echo $ivf->PartnerName->viewAttributes() ?>>
<?php echo $ivf->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->PartnerID->Visible) { // PartnerID ?>
		<tr id="r_PartnerID">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_PartnerID" class="ivfmaster" type="text/html"><span><?php echo $ivf->PartnerID->caption() ?></span></script></td>
			<td<?php echo $ivf->PartnerID->cellAttributes() ?>>
<script id="tpx_ivf_PartnerID" class="ivfmaster" type="text/html">
<span id="el_ivf_PartnerID">
<span<?php echo $ivf->PartnerID->viewAttributes() ?>>
<?php echo $ivf->PartnerID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->DrID->Visible) { // DrID ?>
		<tr id="r_DrID">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_DrID" class="ivfmaster" type="text/html"><span><?php echo $ivf->DrID->caption() ?></span></script></td>
			<td<?php echo $ivf->DrID->cellAttributes() ?>>
<script id="tpx_ivf_DrID" class="ivfmaster" type="text/html">
<span id="el_ivf_DrID">
<span<?php echo $ivf->DrID->viewAttributes() ?>>
<?php echo $ivf->DrID->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->DrDepartment->Visible) { // DrDepartment ?>
		<tr id="r_DrDepartment">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_DrDepartment" class="ivfmaster" type="text/html"><span><?php echo $ivf->DrDepartment->caption() ?></span></script></td>
			<td<?php echo $ivf->DrDepartment->cellAttributes() ?>>
<script id="tpx_ivf_DrDepartment" class="ivfmaster" type="text/html">
<span id="el_ivf_DrDepartment">
<span<?php echo $ivf->DrDepartment->viewAttributes() ?>>
<?php echo $ivf->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
<?php if ($ivf->Doctor->Visible) { // Doctor ?>
		<tr id="r_Doctor">
			<td class="<?php echo $ivf->TableLeftColumnClass ?>"><script id="tpc_ivf_Doctor" class="ivfmaster" type="text/html"><span><?php echo $ivf->Doctor->caption() ?></span></script></td>
			<td<?php echo $ivf->Doctor->cellAttributes() ?>>
<script id="tpx_ivf_Doctor" class="ivfmaster" type="text/html">
<span id="el_ivf_Doctor">
<span<?php echo $ivf->Doctor->viewAttributes() ?>>
<?php echo $ivf->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<div id="tpd_ivfmaster" class="ew-custom-template"></div>
<script id="tpm_ivfmaster" type="text/html">
<div id="ct_ivf_master"><style>
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
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
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
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
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
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
			{
				$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
					if($cid == $VitalsHistory[$x]["TidNo"])
					{
						$kk = 1;
						$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
				}
			}
		}else{
			$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}

  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add

	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";

	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";

	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</div>
</script>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf->Rows) ?> };
ew.applyTemplate("tpd_ivfmaster", "tpm_ivfmaster", "ivfmaster", "<?php echo $ivf->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivfmaster_js").each(function(){ew.addScript(this.text);});
</script>
<?php } ?>