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
$pharmacy_view = new pharmacy_view();

// Run the page
$pharmacy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_view->isExport()) { ?>
<script>
var fpharmacyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacyview = currentForm = new ew.Form("fpharmacyview", "view");
	loadjs.done("fpharmacyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_view->ExportOptions->render("body") ?>
<?php $pharmacy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_view->showPageHeader(); ?>
<?php
$pharmacy_view->showMessage();
?>
<form name="fpharmacyview" id="fpharmacyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_id"><?php echo $pharmacy_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_view->id->cellAttributes() ?>>
<span id="el_pharmacy_id">
<span<?php echo $pharmacy_view->id->viewAttributes() ?>><?php echo $pharmacy_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->op_id->Visible) { // op_id ?>
	<tr id="r_op_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_op_id"><?php echo $pharmacy_view->op_id->caption() ?></span></td>
		<td data-name="op_id" <?php echo $pharmacy_view->op_id->cellAttributes() ?>>
<span id="el_pharmacy_op_id">
<span<?php echo $pharmacy_view->op_id->viewAttributes() ?>><?php echo $pharmacy_view->op_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->ip_id->Visible) { // ip_id ?>
	<tr id="r_ip_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_ip_id"><?php echo $pharmacy_view->ip_id->caption() ?></span></td>
		<td data-name="ip_id" <?php echo $pharmacy_view->ip_id->cellAttributes() ?>>
<span id="el_pharmacy_ip_id">
<span<?php echo $pharmacy_view->ip_id->viewAttributes() ?>><?php echo $pharmacy_view->ip_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_patient_id"><?php echo $pharmacy_view->patient_id->caption() ?></span></td>
		<td data-name="patient_id" <?php echo $pharmacy_view->patient_id->cellAttributes() ?>>
<span id="el_pharmacy_patient_id">
<span<?php echo $pharmacy_view->patient_id->viewAttributes() ?>><?php echo $pharmacy_view->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_charged_date"><?php echo $pharmacy_view->charged_date->caption() ?></span></td>
		<td data-name="charged_date" <?php echo $pharmacy_view->charged_date->cellAttributes() ?>>
<span id="el_pharmacy_charged_date">
<span<?php echo $pharmacy_view->charged_date->viewAttributes() ?>><?php echo $pharmacy_view->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_status"><?php echo $pharmacy_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $pharmacy_view->status->cellAttributes() ?>>
<span id="el_pharmacy_status">
<span<?php echo $pharmacy_view->status->viewAttributes() ?>><?php echo $pharmacy_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_createdby"><?php echo $pharmacy_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_createdby">
<span<?php echo $pharmacy_view->createdby->viewAttributes() ?>><?php echo $pharmacy_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_createddatetime"><?php echo $pharmacy_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_createddatetime">
<span<?php echo $pharmacy_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_modifiedby"><?php echo $pharmacy_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_modifiedby">
<span<?php echo $pharmacy_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_modifieddatetime"><?php echo $pharmacy_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_modifieddatetime">
<span<?php echo $pharmacy_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_services", explode(",", $pharmacy->getCurrentDetailTable())) && $pharmacy_services->DetailView) {
?>
<?php if ($pharmacy->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_servicesgrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_view->isExport()) { ?>
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
$pharmacy_view->terminate();
?>