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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_purchase_requestdelete = currentForm = new ew.Form("fpharmacy_purchase_requestdelete", "delete");

// Form_CustomValidate event
fpharmacy_purchase_requestdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_requestdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_purchase_request_delete->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_delete->showMessage();
?>
<form name="fpharmacy_purchase_requestdelete" id="fpharmacy_purchase_requestdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchase_request_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchase_request_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_purchase_request->id->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id"><?php echo $pharmacy_purchase_request->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_purchase_request->DT->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT"><?php echo $pharmacy_purchase_request->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
		<th class="<?php echo $pharmacy_purchase_request->EmployeeName->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName"><?php echo $pharmacy_purchase_request->EmployeeName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
		<th class="<?php echo $pharmacy_purchase_request->Department->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department"><?php echo $pharmacy_purchase_request->Department->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $pharmacy_purchase_request->ApprovedStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus"><?php echo $pharmacy_purchase_request->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<th class="<?php echo $pharmacy_purchase_request->PurchaseStatus->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus"><?php echo $pharmacy_purchase_request->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchase_request->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID"><?php echo $pharmacy_purchase_request->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_purchase_request->createdby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby"><?php echo $pharmacy_purchase_request->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime"><?php echo $pharmacy_purchase_request->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_purchase_request->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby"><?php echo $pharmacy_purchase_request->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime"><?php echo $pharmacy_purchase_request->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_purchase_request->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE"><?php echo $pharmacy_purchase_request->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchase_request_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_purchase_request_delete->Recordset->EOF) {
	$pharmacy_purchase_request_delete->RecCnt++;
	$pharmacy_purchase_request_delete->RowCnt++;

	// Set row properties
	$pharmacy_purchase_request->resetAttributes();
	$pharmacy_purchase_request->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchase_request_delete->loadRowValues($pharmacy_purchase_request_delete->Recordset);

	// Render row
	$pharmacy_purchase_request_delete->renderRow();
?>
	<tr<?php echo $pharmacy_purchase_request->rowAttributes() ?>>
<?php if ($pharmacy_purchase_request->id->Visible) { // id ?>
		<td<?php echo $pharmacy_purchase_request->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_id" class="pharmacy_purchase_request_id">
<span<?php echo $pharmacy_purchase_request->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->DT->Visible) { // DT ?>
		<td<?php echo $pharmacy_purchase_request->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_DT" class="pharmacy_purchase_request_DT">
<span<?php echo $pharmacy_purchase_request->DT->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->EmployeeName->Visible) { // EmployeeName ?>
		<td<?php echo $pharmacy_purchase_request->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_EmployeeName" class="pharmacy_purchase_request_EmployeeName">
<span<?php echo $pharmacy_purchase_request->EmployeeName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->EmployeeName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->Department->Visible) { // Department ?>
		<td<?php echo $pharmacy_purchase_request->Department->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_Department" class="pharmacy_purchase_request_Department">
<span<?php echo $pharmacy_purchase_request->Department->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td<?php echo $pharmacy_purchase_request->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_ApprovedStatus" class="pharmacy_purchase_request_ApprovedStatus">
<span<?php echo $pharmacy_purchase_request->ApprovedStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td<?php echo $pharmacy_purchase_request->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_PurchaseStatus" class="pharmacy_purchase_request_PurchaseStatus">
<span<?php echo $pharmacy_purchase_request->PurchaseStatus->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_purchase_request->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_HospID" class="pharmacy_purchase_request_HospID">
<span<?php echo $pharmacy_purchase_request->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_purchase_request->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_createdby" class="pharmacy_purchase_request_createdby">
<span<?php echo $pharmacy_purchase_request->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_purchase_request->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_createddatetime" class="pharmacy_purchase_request_createddatetime">
<span<?php echo $pharmacy_purchase_request->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_purchase_request->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_modifiedby" class="pharmacy_purchase_request_modifiedby">
<span<?php echo $pharmacy_purchase_request->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_purchase_request->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_modifieddatetime" class="pharmacy_purchase_request_modifieddatetime">
<span<?php echo $pharmacy_purchase_request->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_purchase_request->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_delete->RowCnt ?>_pharmacy_purchase_request_BRCODE" class="pharmacy_purchase_request_BRCODE">
<span<?php echo $pharmacy_purchase_request->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request->BRCODE->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_delete->terminate();
?>