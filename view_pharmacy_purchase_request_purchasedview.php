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
$view_pharmacy_purchase_request_purchased_view = new view_pharmacy_purchase_request_purchased_view();

// Run the page
$view_pharmacy_purchase_request_purchased_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_purchased_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_pharmacy_purchase_request_purchasedview = currentForm = new ew.Form("fview_pharmacy_purchase_request_purchasedview", "view");

// Form_CustomValidate event
fview_pharmacy_purchase_request_purchasedview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_purchasedview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_purchasedview.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_purchased_view->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_purchasedview.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_purchased_view->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_pharmacy_purchase_request_purchased_view->ExportOptions->render("body") ?>
<?php $view_pharmacy_purchase_request_purchased_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_pharmacy_purchase_request_purchased_view->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_purchased_view->showMessage();
?>
<form name="fview_pharmacy_purchase_request_purchasedview" id="fview_pharmacy_purchase_request_purchasedview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_purchased_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_purchased_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_purchased">
<input type="hidden" name="modal" value="<?php echo (int)$view_pharmacy_purchase_request_purchased_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_pharmacy_purchase_request_purchased->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_id"><script id="tpc_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_pharmacy_purchase_request_purchased->id->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_id" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_DT"><script id="tpc_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->DT->caption() ?></span></script></span></td>
		<td data-name="DT"<?php echo $view_pharmacy_purchase_request_purchased->DT->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_DT" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_DT">
<span<?php echo $view_pharmacy_purchase_request_purchased->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->DT->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->EmployeeName->Visible) { // EmployeeName ?>
	<tr id="r_EmployeeName">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_EmployeeName"><script id="tpc_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->caption() ?></span></script></span></td>
		<td data-name="EmployeeName"<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_EmployeeName" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->EmployeeName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_Department"><script id="tpc_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->Department->caption() ?></span></script></span></td>
		<td data-name="Department"<?php echo $view_pharmacy_purchase_request_purchased->Department->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_Department" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_Department">
<span<?php echo $view_pharmacy_purchase_request_purchased->Department->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->Department->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_ApprovedStatus"><script id="tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->caption() ?></span></script></span></td>
		<td data-name="ApprovedStatus"<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_PurchaseStatus"><script id="tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->caption() ?></span></script></span></td>
		<td data-name="PurchaseStatus"<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_HospID"><script id="tpc_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_pharmacy_purchase_request_purchased->HospID->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_HospID" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_HospID">
<span<?php echo $view_pharmacy_purchase_request_purchased->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_createdby"><script id="tpc_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_pharmacy_purchase_request_purchased->createdby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createdby" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_createdby">
<span<?php echo $view_pharmacy_purchase_request_purchased->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_createddatetime"><script id="tpc_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_createddatetime" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_modifiedby"><script id="tpc_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifiedby" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_modifieddatetime"><script id="tpc_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_modifieddatetime" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_purchased->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $view_pharmacy_purchase_request_purchased_view->TableLeftColumnClass ?>"><span id="elh_view_pharmacy_purchase_request_purchased_BRCODE"><script id="tpc_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchasedview" type="text/html"><span><?php echo $view_pharmacy_purchase_request_purchased->BRCODE->caption() ?></span></script></span></td>
		<td data-name="BRCODE"<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->cellAttributes() ?>>
<script id="tpx_view_pharmacy_purchase_request_purchased_BRCODE" class="view_pharmacy_purchase_request_purchasedview" type="text/html">
<span id="el_view_pharmacy_purchase_request_purchased_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_purchased->BRCODE->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_pharmacy_purchase_request_purchasedview" class="ew-custom-template"></div>
<script id="tpm_view_pharmacy_purchase_request_purchasedview" type="text/html">
<div id="ct_view_pharmacy_purchase_request_purchased_view"><style>
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
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_EmployeeName"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_EmployeeName"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_Department"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_Department"/}}</h3>
	</div>
		<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_DT"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_DT"/}}</h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_ApprovedStatus"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_ApprovedStatus"/}}</h3>
	</div>
	<div class="col-4">
		<h3 class="card-title">{{include tmpl="#tpc_view_pharmacy_purchase_request_purchased_PurchaseStatus"/}}&nbsp;{{include tmpl="#tpx_view_pharmacy_purchase_request_purchased_PurchaseStatus"/}}</h3>
	</div>
</div>
</div>
</script>
<?php
	if (in_array("view_pharmacy_purchase_request_items_purchased", explode(",", $view_pharmacy_purchase_request_purchased->getCurrentDetailTable())) && $view_pharmacy_purchase_request_items_purchased->DetailView) {
?>
<?php if ($view_pharmacy_purchase_request_purchased->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_pharmacy_purchase_request_items_purchased", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_pharmacy_purchase_request_items_purchasedgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_pharmacy_purchase_request_purchased->Rows) ?> };
ew.applyTemplate("tpd_view_pharmacy_purchase_request_purchasedview", "tpm_view_pharmacy_purchase_request_purchasedview", "view_pharmacy_purchase_request_purchasedview", "<?php echo $view_pharmacy_purchase_request_purchased->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_pharmacy_purchase_request_purchasedview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_pharmacy_purchase_request_purchased_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_pharmacy_purchase_request_purchased->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_purchased_view->terminate();
?>