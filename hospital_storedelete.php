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
$hospital_store_delete = new hospital_store_delete();

// Run the page
$hospital_store_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_store_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhospital_storedelete = currentForm = new ew.Form("fhospital_storedelete", "delete");

// Form_CustomValidate event
fhospital_storedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospital_storedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospital_storedelete.lists["x_status"] = <?php echo $hospital_store_delete->status->Lookup->toClientList() ?>;
fhospital_storedelete.lists["x_status"].options = <?php echo JsonEncode($hospital_store_delete->status->lookupOptions()) ?>;
fhospital_storedelete.lists["x_HospId"] = <?php echo $hospital_store_delete->HospId->Lookup->toClientList() ?>;
fhospital_storedelete.lists["x_HospId"].options = <?php echo JsonEncode($hospital_store_delete->HospId->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_store_delete->showPageHeader(); ?>
<?php
$hospital_store_delete->showMessage();
?>
<form name="fhospital_storedelete" id="fhospital_storedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_store_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_store_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital_store">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_store_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital_store->id->Visible) { // id ?>
		<th class="<?php echo $hospital_store->id->headerCellClass() ?>"><span id="elh_hospital_store_id" class="hospital_store_id"><?php echo $hospital_store->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
		<th class="<?php echo $hospital_store->pharmacy->headerCellClass() ?>"><span id="elh_hospital_store_pharmacy" class="hospital_store_pharmacy"><?php echo $hospital_store->pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->street->Visible) { // street ?>
		<th class="<?php echo $hospital_store->street->headerCellClass() ?>"><span id="elh_hospital_store_street" class="hospital_store_street"><?php echo $hospital_store->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->area->Visible) { // area ?>
		<th class="<?php echo $hospital_store->area->headerCellClass() ?>"><span id="elh_hospital_store_area" class="hospital_store_area"><?php echo $hospital_store->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->town->Visible) { // town ?>
		<th class="<?php echo $hospital_store->town->headerCellClass() ?>"><span id="elh_hospital_store_town" class="hospital_store_town"><?php echo $hospital_store->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->province->Visible) { // province ?>
		<th class="<?php echo $hospital_store->province->headerCellClass() ?>"><span id="elh_hospital_store_province" class="hospital_store_province"><?php echo $hospital_store->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital_store->postal_code->headerCellClass() ?>"><span id="elh_hospital_store_postal_code" class="hospital_store_postal_code"><?php echo $hospital_store->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital_store->phone_no->headerCellClass() ?>"><span id="elh_hospital_store_phone_no" class="hospital_store_phone_no"><?php echo $hospital_store->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital_store->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_store_PreFixCode" class="hospital_store_PreFixCode"><?php echo $hospital_store->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->status->Visible) { // status ?>
		<th class="<?php echo $hospital_store->status->headerCellClass() ?>"><span id="elh_hospital_store_status" class="hospital_store_status"><?php echo $hospital_store->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->createdby->Visible) { // createdby ?>
		<th class="<?php echo $hospital_store->createdby->headerCellClass() ?>"><span id="elh_hospital_store_createdby" class="hospital_store_createdby"><?php echo $hospital_store->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $hospital_store->createddatetime->headerCellClass() ?>"><span id="elh_hospital_store_createddatetime" class="hospital_store_createddatetime"><?php echo $hospital_store->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $hospital_store->modifiedby->headerCellClass() ?>"><span id="elh_hospital_store_modifiedby" class="hospital_store_modifiedby"><?php echo $hospital_store->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $hospital_store->modifieddatetime->headerCellClass() ?>"><span id="elh_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime"><?php echo $hospital_store->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital_store->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST"><?php echo $hospital_store->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->HospId->Visible) { // HospId ?>
		<th class="<?php echo $hospital_store->HospId->headerCellClass() ?>"><span id="elh_hospital_store_HospId" class="hospital_store_HospId"><?php echo $hospital_store->HospId->caption() ?></span></th>
<?php } ?>
<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
		<th class="<?php echo $hospital_store->BranchID->headerCellClass() ?>"><span id="elh_hospital_store_BranchID" class="hospital_store_BranchID"><?php echo $hospital_store->BranchID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_store_delete->RecCnt = 0;
$i = 0;
while (!$hospital_store_delete->Recordset->EOF) {
	$hospital_store_delete->RecCnt++;
	$hospital_store_delete->RowCnt++;

	// Set row properties
	$hospital_store->resetAttributes();
	$hospital_store->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_store_delete->loadRowValues($hospital_store_delete->Recordset);

	// Render row
	$hospital_store_delete->renderRow();
?>
	<tr<?php echo $hospital_store->rowAttributes() ?>>
<?php if ($hospital_store->id->Visible) { // id ?>
		<td<?php echo $hospital_store->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_id" class="hospital_store_id">
<span<?php echo $hospital_store->id->viewAttributes() ?>>
<?php echo $hospital_store->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->pharmacy->Visible) { // pharmacy ?>
		<td<?php echo $hospital_store->pharmacy->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_pharmacy" class="hospital_store_pharmacy">
<span<?php echo $hospital_store->pharmacy->viewAttributes() ?>>
<?php echo $hospital_store->pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->street->Visible) { // street ?>
		<td<?php echo $hospital_store->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_street" class="hospital_store_street">
<span<?php echo $hospital_store->street->viewAttributes() ?>>
<?php echo $hospital_store->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->area->Visible) { // area ?>
		<td<?php echo $hospital_store->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_area" class="hospital_store_area">
<span<?php echo $hospital_store->area->viewAttributes() ?>>
<?php echo $hospital_store->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->town->Visible) { // town ?>
		<td<?php echo $hospital_store->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_town" class="hospital_store_town">
<span<?php echo $hospital_store->town->viewAttributes() ?>>
<?php echo $hospital_store->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->province->Visible) { // province ?>
		<td<?php echo $hospital_store->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_province" class="hospital_store_province">
<span<?php echo $hospital_store->province->viewAttributes() ?>>
<?php echo $hospital_store->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->postal_code->Visible) { // postal_code ?>
		<td<?php echo $hospital_store->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_postal_code" class="hospital_store_postal_code">
<span<?php echo $hospital_store->postal_code->viewAttributes() ?>>
<?php echo $hospital_store->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->phone_no->Visible) { // phone_no ?>
		<td<?php echo $hospital_store->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_phone_no" class="hospital_store_phone_no">
<span<?php echo $hospital_store->phone_no->viewAttributes() ?>>
<?php echo $hospital_store->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->PreFixCode->Visible) { // PreFixCode ?>
		<td<?php echo $hospital_store->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_PreFixCode" class="hospital_store_PreFixCode">
<span<?php echo $hospital_store->PreFixCode->viewAttributes() ?>>
<?php echo $hospital_store->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->status->Visible) { // status ?>
		<td<?php echo $hospital_store->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_status" class="hospital_store_status">
<span<?php echo $hospital_store->status->viewAttributes() ?>>
<?php echo $hospital_store->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->createdby->Visible) { // createdby ?>
		<td<?php echo $hospital_store->createdby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_createdby" class="hospital_store_createdby">
<span<?php echo $hospital_store->createdby->viewAttributes() ?>>
<?php echo $hospital_store->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $hospital_store->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_createddatetime" class="hospital_store_createddatetime">
<span<?php echo $hospital_store->createddatetime->viewAttributes() ?>>
<?php echo $hospital_store->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $hospital_store->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_modifiedby" class="hospital_store_modifiedby">
<span<?php echo $hospital_store->modifiedby->viewAttributes() ?>>
<?php echo $hospital_store->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $hospital_store->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_modifieddatetime" class="hospital_store_modifieddatetime">
<span<?php echo $hospital_store->modifieddatetime->viewAttributes() ?>>
<?php echo $hospital_store->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->pharmacyGST->Visible) { // pharmacyGST ?>
		<td<?php echo $hospital_store->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_pharmacyGST" class="hospital_store_pharmacyGST">
<span<?php echo $hospital_store->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital_store->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->HospId->Visible) { // HospId ?>
		<td<?php echo $hospital_store->HospId->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_HospId" class="hospital_store_HospId">
<span<?php echo $hospital_store->HospId->viewAttributes() ?>>
<?php echo $hospital_store->HospId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital_store->BranchID->Visible) { // BranchID ?>
		<td<?php echo $hospital_store->BranchID->cellAttributes() ?>>
<span id="el<?php echo $hospital_store_delete->RowCnt ?>_hospital_store_BranchID" class="hospital_store_BranchID">
<span<?php echo $hospital_store->BranchID->viewAttributes() ?>>
<?php echo $hospital_store->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_store_delete->Recordset->moveNext();
}
$hospital_store_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_store_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_store_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hospital_store_delete->terminate();
?>