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
$view_pharmacy_purchase_request_approved_view = new view_pharmacy_purchase_request_approved_view();

// Run the page
$view_pharmacy_purchase_request_approved_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_approved_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$view_pharmacy_purchase_request_approved_view->isExport()) { ?>
<script>
var fview_pharmacy_purchase_request_approvedview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fview_pharmacy_purchase_request_approvedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_approvedview", "view");
	loadjs.done("fview_pharmacy_purchase_request_approvedview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_approved_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacy_purchase_request_approved_view->ExportOptions->render("body") ?>
<?php $view_pharmacy_purchase_request_approved_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacy_purchase_request_approved_view->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_approved_view->showMessage();
?>
<form name="fview_pharmacy_purchase_request_approvedview" id="fview_pharmacy_purchase_request_approvedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_approved_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_pharmacy_purchase_request_approved_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_id"><script id="tpc_view_pharmacy_purchase_request_approved_id" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $view_pharmacy_purchase_request_approved_view->id->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_id" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_id">
<span<?php echo $view_pharmacy_purchase_request_approved_view->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_DT"><script id="tpc_view_pharmacy_purchase_request_approved_DT" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->DT->caption() ?></script></span></td>
		<td data-name="DT" <?php echo $view_pharmacy_purchase_request_approved_view->DT->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_DT" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_DT">
<span<?php echo $view_pharmacy_purchase_request_approved_view->DT->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->DT->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->EmployeeName->Visible) { // EmployeeName ?>
	<tr id="r_EmployeeName">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_EmployeeName"><script id="tpc_view_pharmacy_purchase_request_approved_EmployeeName" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->EmployeeName->caption() ?></script></span></td>
		<td data-name="EmployeeName" <?php echo $view_pharmacy_purchase_request_approved_view->EmployeeName->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_EmployeeName" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_approved_view->EmployeeName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->EmployeeName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_Department"><script id="tpc_view_pharmacy_purchase_request_approved_Department" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->Department->caption() ?></script></span></td>
		<td data-name="Department" <?php echo $view_pharmacy_purchase_request_approved_view->Department->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_Department" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_Department">
<span<?php echo $view_pharmacy_purchase_request_approved_view->Department->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->Department->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus"><script id="tpc_view_pharmacy_purchase_request_approved_ApprovedStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->ApprovedStatus->caption() ?></script></span></td>
		<td data-name="ApprovedStatus" <?php echo $view_pharmacy_purchase_request_approved_view->ApprovedStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_ApprovedStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_approved_view->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->ApprovedStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus"><script id="tpc_view_pharmacy_purchase_request_approved_PurchaseStatus" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->PurchaseStatus->caption() ?></script></span></td>
		<td data-name="PurchaseStatus" <?php echo $view_pharmacy_purchase_request_approved_view->PurchaseStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_PurchaseStatus" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_approved_view->PurchaseStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->PurchaseStatus->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_HospID"><script id="tpc_view_pharmacy_purchase_request_approved_HospID" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $view_pharmacy_purchase_request_approved_view->HospID->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_HospID" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_approved_view->HospID->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_createdby"><script id="tpc_view_pharmacy_purchase_request_approved_createdby" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $view_pharmacy_purchase_request_approved_view->createdby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_createdby" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_approved_view->createdby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_createddatetime"><script id="tpc_view_pharmacy_purchase_request_approved_createddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $view_pharmacy_purchase_request_approved_view->createddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_createddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved_view->createddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifiedby"><script id="tpc_view_pharmacy_purchase_request_approved_modifiedby" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $view_pharmacy_purchase_request_approved_view->modifiedby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_modifiedby" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_approved_view->modifiedby->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifieddatetime"><script id="tpc_view_pharmacy_purchase_request_approved_modifieddatetime" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $view_pharmacy_purchase_request_approved_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_modifieddatetime" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved_view->modifieddatetime->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_approved_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_approved_BRCODE"><script id="tpc_view_pharmacy_purchase_request_approved_BRCODE" type="text/html"><?php echo $view_pharmacy_purchase_request_approved_view->BRCODE->caption() ?></script></span></td>
		<td data-name="BRCODE" <?php echo $view_pharmacy_purchase_request_approved_view->BRCODE->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_approved_BRCODE" type="text/html"><span id="el_view_pharmacy_purchase_request_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_approved_view->BRCODE->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_approved_view->BRCODE->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_pharmacy_purchase_request_approvedview" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_purchase_request_approvedview" type="text/html">
<div id="ct_view_pharmacy_purchase_request_approved_view"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
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
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_EmployeeName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_EmployeeName")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_Department"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_Department")/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_DT"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_DT")/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_approved_ApprovedStatus"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_view_pharmacy_purchase_request_approved_ApprovedStatus")/}}</h3>
	</div>
</div>	
</div>
</script>

<?php
	if (in_array("view_pharmacy_purchase_request_items_approved", explode(",", $view_pharmacy_purchase_request_approved->getCurrentDetailTable())) && $view_pharmacy_purchase_request_items_approved->DetailView) {
?>
<?php if ($view_pharmacy_purchase_request_approved->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("view_pharmacy_purchase_request_items_approved", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_purchase_request_items_approvedgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($view_pharmacy_purchase_request_approved->Rows) ?> };
	ew.applyTemplate("tpd_view_pharmacy_purchase_request_approvedview", "tpm_view_pharmacy_purchase_request_approvedview", "view_pharmacy_purchase_request_approvedview", "<?php echo $view_pharmacy_purchase_request_approved->CustomExport ?>", ew.templateData.rows[0]);
	$("script.view_pharmacy_purchase_request_approvedview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$view_pharmacy_purchase_request_approved_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_approved_view->isExport()) { ?>
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
$view_pharmacy_purchase_request_approved_view->terminate();
?>