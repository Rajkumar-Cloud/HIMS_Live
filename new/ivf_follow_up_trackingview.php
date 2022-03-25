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
<?php include_once "header.php"; ?>
<?php if (!$ivf_follow_up_tracking_view->isExport()) { ?>
<script>
var fivf_follow_up_trackingview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_follow_up_trackingview = currentForm = new ew.Form("fivf_follow_up_trackingview", "view");
	loadjs.done("fivf_follow_up_trackingview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_follow_up_tracking_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_follow_up_tracking">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_follow_up_tracking_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($ivf_follow_up_tracking_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_id"><script id="tpc_ivf_follow_up_tracking_id" type="text/html"><?php echo $ivf_follow_up_tracking_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $ivf_follow_up_tracking_view->id->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_id" type="text/html"><span id="el_ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking_view->id->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_RIDNO"><script id="tpc_ivf_follow_up_tracking_RIDNO" type="text/html"><?php echo $ivf_follow_up_tracking_view->RIDNO->caption() ?></script></span></td>
		<td data-name="RIDNO" <?php echo $ivf_follow_up_tracking_view->RIDNO->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_RIDNO" type="text/html"><span id="el_ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking_view->RIDNO->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->RIDNO->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Name"><script id="tpc_ivf_follow_up_tracking_Name" type="text/html"><?php echo $ivf_follow_up_tracking_view->Name->caption() ?></script></span></td>
		<td data-name="Name" <?php echo $ivf_follow_up_tracking_view->Name->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Name" type="text/html"><span id="el_ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking_view->Name->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->Name->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_Age"><script id="tpc_ivf_follow_up_tracking_Age" type="text/html"><?php echo $ivf_follow_up_tracking_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $ivf_follow_up_tracking_view->Age->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_Age" type="text/html"><span id="el_ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking_view->Age->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->MReadMore->Visible) { // MReadMore ?>
	<tr id="r_MReadMore">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_MReadMore"><script id="tpc_ivf_follow_up_tracking_MReadMore" type="text/html"><?php echo $ivf_follow_up_tracking_view->MReadMore->caption() ?></script></span></td>
		<td data-name="MReadMore" <?php echo $ivf_follow_up_tracking_view->MReadMore->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_MReadMore" type="text/html"><span id="el_ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking_view->MReadMore->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->MReadMore->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_status"><script id="tpc_ivf_follow_up_tracking_status" type="text/html"><?php echo $ivf_follow_up_tracking_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $ivf_follow_up_tracking_view->status->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_status" type="text/html"><span id="el_ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking_view->status->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdby"><script id="tpc_ivf_follow_up_tracking_createdby" type="text/html"><?php echo $ivf_follow_up_tracking_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $ivf_follow_up_tracking_view->createdby->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createdby" type="text/html"><span id="el_ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking_view->createdby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createddatetime"><script id="tpc_ivf_follow_up_tracking_createddatetime" type="text/html"><?php echo $ivf_follow_up_tracking_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $ivf_follow_up_tracking_view->createddatetime->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createddatetime" type="text/html"><span id="el_ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking_view->createddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifiedby"><script id="tpc_ivf_follow_up_tracking_modifiedby" type="text/html"><?php echo $ivf_follow_up_tracking_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $ivf_follow_up_tracking_view->modifiedby->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_modifiedby" type="text/html"><span id="el_ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking_view->modifiedby->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_modifieddatetime"><script id="tpc_ivf_follow_up_tracking_modifieddatetime" type="text/html"><?php echo $ivf_follow_up_tracking_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $ivf_follow_up_tracking_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_modifieddatetime" type="text/html"><span id="el_ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking_view->modifieddatetime->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_TidNo"><script id="tpc_ivf_follow_up_tracking_TidNo" type="text/html"><?php echo $ivf_follow_up_tracking_view->TidNo->caption() ?></script></span></td>
		<td data-name="TidNo" <?php echo $ivf_follow_up_tracking_view->TidNo->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_TidNo" type="text/html"><span id="el_ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking_view->TidNo->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->TidNo->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->createdUserName->Visible) { // createdUserName ?>
	<tr id="r_createdUserName">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_createdUserName"><script id="tpc_ivf_follow_up_tracking_createdUserName" type="text/html"><?php echo $ivf_follow_up_tracking_view->createdUserName->caption() ?></script></span></td>
		<td data-name="createdUserName" <?php echo $ivf_follow_up_tracking_view->createdUserName->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_createdUserName" type="text/html"><span id="el_ivf_follow_up_tracking_createdUserName">
<span<?php echo $ivf_follow_up_tracking_view->createdUserName->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->createdUserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->FollowUpDate->Visible) { // FollowUpDate ?>
	<tr id="r_FollowUpDate">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_FollowUpDate"><script id="tpc_ivf_follow_up_tracking_FollowUpDate" type="text/html"><?php echo $ivf_follow_up_tracking_view->FollowUpDate->caption() ?></script></span></td>
		<td data-name="FollowUpDate" <?php echo $ivf_follow_up_tracking_view->FollowUpDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_FollowUpDate" type="text/html"><span id="el_ivf_follow_up_tracking_FollowUpDate">
<span<?php echo $ivf_follow_up_tracking_view->FollowUpDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->FollowUpDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->NextVistDate->Visible) { // NextVistDate ?>
	<tr id="r_NextVistDate">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_NextVistDate"><script id="tpc_ivf_follow_up_tracking_NextVistDate" type="text/html"><?php echo $ivf_follow_up_tracking_view->NextVistDate->caption() ?></script></span></td>
		<td data-name="NextVistDate" <?php echo $ivf_follow_up_tracking_view->NextVistDate->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_NextVistDate" type="text/html"><span id="el_ivf_follow_up_tracking_NextVistDate">
<span<?php echo $ivf_follow_up_tracking_view->NextVistDate->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->NextVistDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_follow_up_tracking_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $ivf_follow_up_tracking_view->TableLeftColumnClass ?>"><span id="elh_ivf_follow_up_tracking_HospID"><script id="tpc_ivf_follow_up_tracking_HospID" type="text/html"><?php echo $ivf_follow_up_tracking_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $ivf_follow_up_tracking_view->HospID->cellAttributes() ?>>
<script id="tpx_ivf_follow_up_tracking_HospID" type="text/html"><span id="el_ivf_follow_up_tracking_HospID">
<span<?php echo $ivf_follow_up_tracking_view->HospID->viewAttributes() ?>><?php echo $ivf_follow_up_tracking_view->HospID->getViewValue() ?></span>
</span></script>
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
{{include tmpl="#tpc_ivf_follow_up_tracking_RIDNO"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_follow_up_tracking_RIDNO")/}}
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
					<span class="ew-cell">{{include tmpl="#tpc_ivf_follow_up_tracking_MReadMore"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_ivf_follow_up_tracking_MReadMore")/}}</span>
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
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($ivf_follow_up_tracking->Rows) ?> };
	ew.applyTemplate("tpd_ivf_follow_up_trackingview", "tpm_ivf_follow_up_trackingview", "ivf_follow_up_trackingview", "<?php echo $ivf_follow_up_tracking->CustomExport ?>", ew.templateData.rows[0]);
	$("script.ivf_follow_up_trackingview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$ivf_follow_up_tracking_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_follow_up_tracking_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$ivf_follow_up_tracking_view->terminate();
?>