<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$ivf_follow_up_tracking_view = new ivf_follow_up_tracking_view();

// Run the page
$ivf_follow_up_tracking_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fivf_follow_up_trackingview = currentForm = new ew.Form("fivf_follow_up_trackingview", "view");

// Form_CustomValidate event
fivf_follow_up_trackingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_follow_up_trackingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_follow_up_tracking_view->ExportOptions->render("body") ?>
<?php $ivf_follow_up_tracking_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_follow_up_tracking_view->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_view->showMessage();
?>
<form name="fivf_follow_up_trackingview" id="fivf_follow_up_trackingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($ivf_follow_up_tracking_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $ivf_follow_up_tracking_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_follow_up_tracking_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_id"><script id="tpc_ivf_follow_up_tracking_id" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_id" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_RIDNO"><script id="tpc_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Name"><script id="tpc_ivf_follow_up_tracking_Name" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->Name->caption() ?></span></script></span></td>
		<td data-name="Name"<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Name" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Name->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Age"><script id="tpc_ivf_follow_up_tracking_Age" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Age" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
	<tr id="r_MReadMore">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_MReadMore"><script id="tpc_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></span></script></span></td>
		<td data-name="MReadMore"<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_status"><script id="tpc_ivf_follow_up_tracking_status" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_status" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdby"><script id="tpc_ivf_follow_up_tracking_createdby" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $ivf_follow_up_tracking->createdby->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createdby" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createddatetime"><script id="tpc_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $ivf_follow_up_tracking->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifiedby"><script id="tpc_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $ivf_follow_up_tracking->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime"><script id="tpc_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $ivf_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_TidNo"><script id="tpc_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdUserName->Visible) { // createdUserName ?>
	<tr id="r_createdUserName">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdUserName"><script id="tpc_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->createdUserName->caption() ?></span></script></span></td>
		<td data-name="createdUserName"<?php echo $ivf_follow_up_tracking->createdUserName->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createdUserName" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking->createdUserName->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdUserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->FollowUpDate->Visible) { // FollowUpDate ?>
	<tr id="r_FollowUpDate">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate"><script id="tpc_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->FollowUpDate->caption() ?></span></script></span></td>
		<td data-name="FollowUpDate"<?php echo $ivf_follow_up_tracking->FollowUpDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_FollowUpDate" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking->FollowUpDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->FollowUpDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->NextVistDate->Visible) { // NextVistDate ?>
	<tr id="r_NextVistDate">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate"><script id="tpc_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->NextVistDate->caption() ?></span></script></span></td>
		<td data-name="NextVistDate"<?php echo $ivf_follow_up_tracking->NextVistDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_NextVistDate" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking->NextVistDate->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->NextVistDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_HospID"><script id="tpc_ivf_follow_up_tracking_HospID" class="ivf_follow_up_trackingview" type="text/html"><span><?php echo $ivf_follow_up_tracking->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $ivf_follow_up_tracking->HospID->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_HospID" class="ivf_follow_up_trackingview" type="text/html">
<span id="el_ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking->HospID->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_ivf_follow_up_trackingview" class="ew-custom-template"></div>
<script id="tpm_ivf_follow_up_trackingview" type="text/html">
<div id="ct_ivf_follow_up_tracking_view"><style>
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
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
{{include tmpl="#tpc_ivf_follow_up_tracking_RIDNO"/}}&nbsp;{{include tmpl="#tpx_ivf_follow_up_tracking_RIDNO"/}}
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
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
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Follow up</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell">{{include tmpl="#tpc_ivf_follow_up_tracking_MReadMore"/}}&nbsp;{{include tmpl="#tpx_ivf_follow_up_tracking_MReadMore"/}}</span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($ivf_follow_up_tracking->Rows) ?> };
ew.applyTemplate("tpd_ivf_follow_up_trackingview", "tpm_ivf_follow_up_trackingview", "ivf_follow_up_trackingview", "<?php echo $ivf_follow_up_tracking->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.ivf_follow_up_trackingview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$ivf_follow_up_tracking_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$ivf_follow_up_tracking_view->terminate();
?>