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
$view_pharmacy_purchase_request_approved_delete = new view_pharmacy_purchase_request_approved_delete();

// Run the page
$view_pharmacy_purchase_request_approved_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_approved_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_pharmacy_purchase_request_approveddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_approveddelete", "delete");

// Form_CustomValidate event
fview_pharmacy_purchase_request_approveddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_approveddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_approveddelete.lists["x_ApprovedStatus"] = <?php echo $view_pharmacy_purchase_request_approved_delete->ApprovedStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_approveddelete.lists["x_ApprovedStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_approved_delete->ApprovedStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_purchase_request_approved_delete->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_approved_delete->showMessage();
?>
<form name="fview_pharmacy_purchase_request_approveddelete" id="fview_pharmacy_purchase_request_approveddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_approved_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_approved_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_approved">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_purchase_request_approved_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id"><?php echo $view_pharmacy_purchase_request_approved->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->DT->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT"><?php echo $view_pharmacy_purchase_request_approved->DT->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName"><?php echo $view_pharmacy_purchase_request_approved->EmployeeName->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->Department->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department"><?php echo $view_pharmacy_purchase_request_approved->Department->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->HospID->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID"><?php echo $view_pharmacy_purchase_request_approved->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->createdby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby"><?php echo $view_pharmacy_purchase_request_approved->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->createddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime"><?php echo $view_pharmacy_purchase_request_approved->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->modifiedby->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby"><?php echo $view_pharmacy_purchase_request_approved->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime"><?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $view_pharmacy_purchase_request_approved->BRCODE->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE"><?php echo $view_pharmacy_purchase_request_approved->BRCODE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_purchase_request_approved_delete->RecCnt = 0;
$i = 0;
while (!$view_pharmacy_purchase_request_approved_delete->Recordset->EOF) {
	$view_pharmacy_purchase_request_approved_delete->RecCnt++;
	$view_pharmacy_purchase_request_approved_delete->RowCnt++;

	// Set row properties
	$view_pharmacy_purchase_request_approved->resetAttributes();
	$view_pharmacy_purchase_request_approved->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_purchase_request_approved_delete->loadRowValues($view_pharmacy_purchase_request_approved_delete->Recordset);

	// Render row
	$view_pharmacy_purchase_request_approved_delete->renderRow();
?>
	<tr<?php echo $view_pharmacy_purchase_request_approved->rowAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_approved->id->Visible) { // id ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_id" class="view_pharmacy_purchase_request_approved_id">
<span<?php echo $view_pharmacy_purchase_request_approved->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->DT->Visible) { // DT ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->DT->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_DT" class="view_pharmacy_purchase_request_approved_DT">
<span<?php echo $view_pharmacy_purchase_request_approved->DT->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->EmployeeName->Visible) { // EmployeeName ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_EmployeeName" class="view_pharmacy_purchase_request_approved_EmployeeName">
<span<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->EmployeeName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->Department->Visible) { // Department ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->Department->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_Department" class="view_pharmacy_purchase_request_approved_Department">
<span<?php echo $view_pharmacy_purchase_request_approved->Department->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_ApprovedStatus" class="view_pharmacy_purchase_request_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_PurchaseStatus" class="view_pharmacy_purchase_request_approved_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->HospID->Visible) { // HospID ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->HospID->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_HospID" class="view_pharmacy_purchase_request_approved_HospID">
<span<?php echo $view_pharmacy_purchase_request_approved->HospID->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createdby->Visible) { // createdby ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->createdby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_createdby" class="view_pharmacy_purchase_request_approved_createdby">
<span<?php echo $view_pharmacy_purchase_request_approved->createdby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_createddatetime" class="view_pharmacy_purchase_request_approved_createddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->createddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_modifiedby" class="view_pharmacy_purchase_request_approved_modifiedby">
<span<?php echo $view_pharmacy_purchase_request_approved->modifiedby->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_modifieddatetime" class="view_pharmacy_purchase_request_approved_modifieddatetime">
<span<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_approved->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $view_pharmacy_purchase_request_approved->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_approved_delete->RowCnt ?>_view_pharmacy_purchase_request_approved_BRCODE" class="view_pharmacy_purchase_request_approved_BRCODE">
<span<?php echo $view_pharmacy_purchase_request_approved->BRCODE->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_approved->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_pharmacy_purchase_request_approved_delete->Recordset->moveNext();
}
$view_pharmacy_purchase_request_approved_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_approved_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_pharmacy_purchase_request_approved_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_approved_delete->terminate();
?>