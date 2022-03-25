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
$pharmacy_purchase_request_view = new pharmacy_purchase_request_view();

// Run the page
$pharmacy_purchase_request_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_purchase_request_view->isExport()) { ?>
<script>
var fpharmacy_purchase_requestview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_purchase_requestview = currentForm = new ew.Form("fpharmacy_purchase_requestview", "view");
	loadjs.done("fpharmacy_purchase_requestview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_purchase_request_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_purchase_request_view->ExportOptions->render("body") ?>
<?php $pharmacy_purchase_request_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_purchase_request_view->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_view->showMessage();
?>
<form name="fpharmacy_purchase_requestview" id="fpharmacy_purchase_requestview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchase_request_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_id"><?php echo $pharmacy_purchase_request_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_purchase_request_view->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request_view->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_DT"><?php echo $pharmacy_purchase_request_view->DT->caption() ?></span></td>
		<td data-name="DT" <?php echo $pharmacy_purchase_request_view->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request_view->DT->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->EmployeeName->Visible) { // EmployeeName ?>
	<tr id="r_EmployeeName">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_EmployeeName"><?php echo $pharmacy_purchase_request_view->EmployeeName->caption() ?></span></td>
		<td data-name="EmployeeName" <?php echo $pharmacy_purchase_request_view->EmployeeName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request_view->EmployeeName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->EmployeeName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_Department"><?php echo $pharmacy_purchase_request_view->Department->caption() ?></span></td>
		<td data-name="Department" <?php echo $pharmacy_purchase_request_view->Department->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request_view->Department->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_ApprovedStatus"><?php echo $pharmacy_purchase_request_view->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus" <?php echo $pharmacy_purchase_request_view->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request_view->ApprovedStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_PurchaseStatus"><?php echo $pharmacy_purchase_request_view->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus" <?php echo $pharmacy_purchase_request_view->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request_view->PurchaseStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_HospID"><?php echo $pharmacy_purchase_request_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $pharmacy_purchase_request_view->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request_view->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createdby"><?php echo $pharmacy_purchase_request_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $pharmacy_purchase_request_view->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request_view->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createddatetime"><?php echo $pharmacy_purchase_request_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $pharmacy_purchase_request_view->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request_view->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifiedby"><?php echo $pharmacy_purchase_request_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $pharmacy_purchase_request_view->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request_view->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifieddatetime"><?php echo $pharmacy_purchase_request_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $pharmacy_purchase_request_view->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_view->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request_view->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_BRCODE"><?php echo $pharmacy_purchase_request_view->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE" <?php echo $pharmacy_purchase_request_view->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request_view->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_view->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_purchase_request_items", explode(",", $pharmacy_purchase_request->getCurrentDetailTable())) && $pharmacy_purchase_request_items->DetailView) {
?>
<?php if ($pharmacy_purchase_request->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("pharmacy_purchase_request_items", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchase_request_itemsgrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_purchase_request_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request_view->isExport()) { ?>
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
$pharmacy_purchase_request_view->terminate();
?>