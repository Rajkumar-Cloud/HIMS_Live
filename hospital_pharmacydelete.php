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
$hospital_pharmacy_delete = new hospital_pharmacy_delete();

// Run the page
$hospital_pharmacy_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_pharmacy_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhospital_pharmacydelete = currentForm = new ew.Form("fhospital_pharmacydelete", "delete");

// Form_CustomValidate event
fhospital_pharmacydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_pharmacydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_pharmacydelete.lists["x_status"] = <?php echo $hospital_pharmacy_delete->status->Lookup->toClientList() ?>;
fhospital_pharmacydelete.lists["x_status"].options = <?php echo JsonEncode($hospital_pharmacy_delete->status->lookupOptions()) ?>;
fhospital_pharmacydelete.lists["x_HospId"] = <?php echo $hospital_pharmacy_delete->HospId->Lookup->toClientList() ?>;
fhospital_pharmacydelete.lists["x_HospId"].options = <?php echo JsonEncode($hospital_pharmacy_delete->HospId->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_pharmacy_delete->showPageHeader(); ?>
<?php
$hospital_pharmacy_delete->showMessage();
?>
<form name="fhospital_pharmacydelete" id="fhospital_pharmacydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_pharmacy_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_pharmacy_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_pharmacy">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_pharmacy_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital_pharmacy->id->Visible) { // id ?>
		<th class="<?php echo $hospital_pharmacy->id->headerCellClass() ?>"><span id="elh_hospital_pharmacy_id" class="hospital_pharmacy_id"><?php echo $hospital_pharmacy->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $hospital_pharmacy->pharmacy->headerCellClass() ?>"><span id="elh_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy"><?php echo $hospital_pharmacy->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->street->Visible) { // street ?>
		<th class="<?php echo $hospital_pharmacy->street->headerCellClass() ?>"><span id="elh_hospital_pharmacy_street" class="hospital_pharmacy_street"><?php echo $hospital_pharmacy->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->area->Visible) { // area ?>
		<th class="<?php echo $hospital_pharmacy->area->headerCellClass() ?>"><span id="elh_hospital_pharmacy_area" class="hospital_pharmacy_area"><?php echo $hospital_pharmacy->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->town->Visible) { // town ?>
		<th class="<?php echo $hospital_pharmacy->town->headerCellClass() ?>"><span id="elh_hospital_pharmacy_town" class="hospital_pharmacy_town"><?php echo $hospital_pharmacy->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->province->Visible) { // province ?>
		<th class="<?php echo $hospital_pharmacy->province->headerCellClass() ?>"><span id="elh_hospital_pharmacy_province" class="hospital_pharmacy_province"><?php echo $hospital_pharmacy->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital_pharmacy->postal_code->headerCellClass() ?>"><span id="elh_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code"><?php echo $hospital_pharmacy->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital_pharmacy->phone_no->headerCellClass() ?>"><span id="elh_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no"><?php echo $hospital_pharmacy->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital_pharmacy->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode"><?php echo $hospital_pharmacy->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->status->Visible) { // status ?>
		<th class="<?php echo $hospital_pharmacy->status->headerCellClass() ?>"><span id="elh_hospital_pharmacy_status" class="hospital_pharmacy_status"><?php echo $hospital_pharmacy->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->createdby->Visible) { // createdby ?>
		<th class="<?php echo $hospital_pharmacy->createdby->headerCellClass() ?>"><span id="elh_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby"><?php echo $hospital_pharmacy->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $hospital_pharmacy->createddatetime->headerCellClass() ?>"><span id="elh_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime"><?php echo $hospital_pharmacy->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $hospital_pharmacy->modifiedby->headerCellClass() ?>"><span id="elh_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby"><?php echo $hospital_pharmacy->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $hospital_pharmacy->modifieddatetime->headerCellClass() ?>"><span id="elh_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime"><?php echo $hospital_pharmacy->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital_pharmacy->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST"><?php echo $hospital_pharmacy->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->HospId->Visible) { // HospId ?>
		<th class="<?php echo $hospital_pharmacy->HospId->headerCellClass() ?>"><span id="elh_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId"><?php echo $hospital_pharmacy->HospId->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_pharmacy->BranchID->Visible) { // BranchID ?>
		<th class="<?php echo $hospital_pharmacy->BranchID->headerCellClass() ?>"><span id="elh_hospital_pharmacy_BranchID" class="hospital_pharmacy_BranchID"><?php echo $hospital_pharmacy->BranchID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_pharmacy_delete->RecCnt = 0;
$i = 0;
while (!$hospital_pharmacy_delete->Recordset->EOF) {
	$hospital_pharmacy_delete->RecCnt++;
	$hospital_pharmacy_delete->RowCnt++;

	// Set row properties
	$hospital_pharmacy->resetAttributes();
	$hospital_pharmacy->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_pharmacy_delete->loadRowValues($hospital_pharmacy_delete->Recordset);

	// Render row
	$hospital_pharmacy_delete->renderRow();
?>
	<tr<?php echo $hospital_pharmacy->rowAttributes() ?>>
<?php if ($hospital_pharmacy->id->Visible) { // id ?>
		<td<?php echo $hospital_pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_id" class="hospital_pharmacy_id">
<span<?php echo $hospital_pharmacy->id->viewAttributes() ?>>
<?php echo $hospital_pharmacy->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacy->Visible) { // pharmacy ?>
		<td<?php echo $hospital_pharmacy->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_pharmacy" class="hospital_pharmacy_pharmacy">
<span<?php echo $hospital_pharmacy->pharmacy->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->street->Visible) { // street ?>
		<td<?php echo $hospital_pharmacy->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_street" class="hospital_pharmacy_street">
<span<?php echo $hospital_pharmacy->street->viewAttributes() ?>>
<?php echo $hospital_pharmacy->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->area->Visible) { // area ?>
		<td<?php echo $hospital_pharmacy->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_area" class="hospital_pharmacy_area">
<span<?php echo $hospital_pharmacy->area->viewAttributes() ?>>
<?php echo $hospital_pharmacy->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->town->Visible) { // town ?>
		<td<?php echo $hospital_pharmacy->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_town" class="hospital_pharmacy_town">
<span<?php echo $hospital_pharmacy->town->viewAttributes() ?>>
<?php echo $hospital_pharmacy->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->province->Visible) { // province ?>
		<td<?php echo $hospital_pharmacy->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_province" class="hospital_pharmacy_province">
<span<?php echo $hospital_pharmacy->province->viewAttributes() ?>>
<?php echo $hospital_pharmacy->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->postal_code->Visible) { // postal_code ?>
		<td<?php echo $hospital_pharmacy->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_postal_code" class="hospital_pharmacy_postal_code">
<span<?php echo $hospital_pharmacy->postal_code->viewAttributes() ?>>
<?php echo $hospital_pharmacy->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->phone_no->Visible) { // phone_no ?>
		<td<?php echo $hospital_pharmacy->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_phone_no" class="hospital_pharmacy_phone_no">
<span<?php echo $hospital_pharmacy->phone_no->viewAttributes() ?>>
<?php echo $hospital_pharmacy->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->PreFixCode->Visible) { // PreFixCode ?>
		<td<?php echo $hospital_pharmacy->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_PreFixCode" class="hospital_pharmacy_PreFixCode">
<span<?php echo $hospital_pharmacy->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_pharmacy->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->status->Visible) { // status ?>
		<td<?php echo $hospital_pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_status" class="hospital_pharmacy_status">
<span<?php echo $hospital_pharmacy->status->viewAttributes() ?>>
<?php echo $hospital_pharmacy->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->createdby->Visible) { // createdby ?>
		<td<?php echo $hospital_pharmacy->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_createdby" class="hospital_pharmacy_createdby">
<span<?php echo $hospital_pharmacy->createdby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $hospital_pharmacy->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_createddatetime" class="hospital_pharmacy_createddatetime">
<span<?php echo $hospital_pharmacy->createddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $hospital_pharmacy->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_modifiedby" class="hospital_pharmacy_modifiedby">
<span<?php echo $hospital_pharmacy->modifiedby->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $hospital_pharmacy->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_modifieddatetime" class="hospital_pharmacy_modifieddatetime">
<span<?php echo $hospital_pharmacy->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_pharmacy->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->pharmacyGST->Visible) { // pharmacyGST ?>
		<td<?php echo $hospital_pharmacy->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_pharmacyGST" class="hospital_pharmacy_pharmacyGST">
<span<?php echo $hospital_pharmacy->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_pharmacy->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->HospId->Visible) { // HospId ?>
		<td<?php echo $hospital_pharmacy->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_HospId" class="hospital_pharmacy_HospId">
<span<?php echo $hospital_pharmacy->HospId->viewAttributes() ?>>
<?php echo $hospital_pharmacy->HospId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_pharmacy->BranchID->Visible) { // BranchID ?>
		<td<?php echo $hospital_pharmacy->BranchID->cellAttributes() ?>>
<span id="el<?php echo $hospital_pharmacy_delete->RowCnt ?>_hospital_pharmacy_BranchID" class="hospital_pharmacy_BranchID">
<span<?php echo $hospital_pharmacy->BranchID->viewAttributes() ?>>
<?php echo $hospital_pharmacy->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_pharmacy_delete->Recordset->moveNext();
}
$hospital_pharmacy_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_pharmacy_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_pharmacy_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hospital_pharmacy_delete->terminate();
?>