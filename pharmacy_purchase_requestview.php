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
<?php include_once "header.php" ?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_purchase_requestview = currentForm = new ew.Form("fpharmacy_purchase_requestview", "view");

// Form_CustomValidate event
fpharmacy_purchase_requestview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_requestview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
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
<?php if ($pharmacy_purchase_request_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_purchase_request_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_id"><?php echo $pharmacy_purchase_request->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pharmacy_purchase_request->id->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
	<tr id="r_DT">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_DT"><?php echo $pharmacy_purchase_request->DT->caption() ?></span></td>
		<td data-name="DT"<?php echo $pharmacy_purchase_request->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request->DT->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->DT->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
	<tr id="r_EmployeeName">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_EmployeeName"><?php echo $pharmacy_purchase_request->EmployeeName->caption() ?></span></td>
		<td data-name="EmployeeName"<?php echo $pharmacy_purchase_request->EmployeeName->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request->EmployeeName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->EmployeeName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_Department"><?php echo $pharmacy_purchase_request->Department->caption() ?></span></td>
		<td data-name="Department"<?php echo $pharmacy_purchase_request->Department->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request->Department->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
	<tr id="r_ApprovedStatus">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_ApprovedStatus"><?php echo $pharmacy_purchase_request->ApprovedStatus->caption() ?></span></td>
		<td data-name="ApprovedStatus"<?php echo $pharmacy_purchase_request->ApprovedStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request->ApprovedStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
	<tr id="r_PurchaseStatus">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_PurchaseStatus"><?php echo $pharmacy_purchase_request->PurchaseStatus->caption() ?></span></td>
		<td data-name="PurchaseStatus"<?php echo $pharmacy_purchase_request->PurchaseStatus->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request->PurchaseStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_HospID"><?php echo $pharmacy_purchase_request->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $pharmacy_purchase_request->HospID->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createdby"><?php echo $pharmacy_purchase_request->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $pharmacy_purchase_request->createdby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_createddatetime"><?php echo $pharmacy_purchase_request->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_purchase_request->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifiedby"><?php echo $pharmacy_purchase_request->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_purchase_request->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_modifieddatetime"><?php echo $pharmacy_purchase_request->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_purchase_request->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
	<tr id="r_BRCODE">
		<td class="<?php echo $pharmacy_purchase_request_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_purchase_request_BRCODE"><?php echo $pharmacy_purchase_request->BRCODE->caption() ?></span></td>
		<td data-name="BRCODE"<?php echo $pharmacy_purchase_request->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->BRCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("pharmacy_purchase_request_items", explode(",", $pharmacy_purchase_request->getCurrentDetailTable())) && $pharmacy_purchase_request_items->DetailView) {
?>
<?php if ($pharmacy_purchase_request->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_purchase_request_items", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_purchase_request_itemsgrid.php" ?>
<?php } ?>
</form>
<?php
$pharmacy_purchase_request_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_purchase_request->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_view->terminate();
?>