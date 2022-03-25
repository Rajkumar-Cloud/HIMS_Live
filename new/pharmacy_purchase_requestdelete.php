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
$pharmacy_purchase_request_delete = new pharmacy_purchase_request_delete();

// Run the page
$pharmacy_purchase_request_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchase_requestdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_purchase_requestdelete = currentForm = new ew.Form("fpharmacy_purchase_requestdelete", "delete");
	loadjs.done("fpharmacy_purchase_requestdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchase_request_delete->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_delete->showMessage();
?>
<form name="fpharmacy_purchase_requestdelete" id="fpharmacy_purchase_requestdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchase_request_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchase_request_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id"><?php echo $pharmacy_purchase_request_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->DT->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT"><?php echo $pharmacy_purchase_request_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->EmployeeName->Visible) { // EmployeeName ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->EmployeeName->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName"><?php echo $pharmacy_purchase_request_delete->EmployeeName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->Department->Visible) { // Department ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->Department->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department"><?php echo $pharmacy_purchase_request_delete->Department->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->ApprovedStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus"><?php echo $pharmacy_purchase_request_delete->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->PurchaseStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus"><?php echo $pharmacy_purchase_request_delete->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID"><?php echo $pharmacy_purchase_request_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby"><?php echo $pharmacy_purchase_request_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime"><?php echo $pharmacy_purchase_request_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby"><?php echo $pharmacy_purchase_request_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime"><?php echo $pharmacy_purchase_request_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_purchase_request_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE"><?php echo $pharmacy_purchase_request_delete->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchase_request_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_purchase_request_delete->Recordset->EOF) {
	$pharmacy_purchase_request_delete->RecordCount++;
	$pharmacy_purchase_request_delete->RowCount++;

	// Set row properties
	$pharmacy_purchase_request->resetAttributes();
	$pharmacy_purchase_request->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchase_request_delete->loadRowValues($pharmacy_purchase_request_delete->Recordset);

	// Render row
	$pharmacy_purchase_request_delete->renderRow();
?>
	<tr <?php echo $pharmacy_purchase_request->rowAttributes() ?>>
<?php if ($pharmacy_purchase_request_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_purchase_request_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request_delete->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->DT->Visible) { // DT ?>
		<td <?php echo $pharmacy_purchase_request_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request_delete->DT->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->EmployeeName->Visible) { // EmployeeName ?>
		<td <?php echo $pharmacy_purchase_request_delete->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request_delete->EmployeeName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->EmployeeName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->Department->Visible) { // Department ?>
		<td <?php echo $pharmacy_purchase_request_delete->Department->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request_delete->Department->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td <?php echo $pharmacy_purchase_request_delete->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request_delete->ApprovedStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td <?php echo $pharmacy_purchase_request_delete->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request_delete->PurchaseStatus->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_purchase_request_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_purchase_request_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_purchase_request_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_purchase_request_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_purchase_request_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_purchase_request_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCount ?>_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_purchase_request_delete->Recordset->moveNext();
}
$pharmacy_purchase_request_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchase_request_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_purchase_request_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pharmacy_purchase_request_delete->terminate();
?>