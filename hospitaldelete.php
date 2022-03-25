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
$hospital_delete = new hospital_delete();

// Run the page
$hospital_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hospital_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhospitaldelete = currentForm = new ew.Form("fhospitaldelete", "delete");

// Form_CustomValidate event
fhospitaldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhospitaldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhospitaldelete.lists["x_status"] = <?php echo $hospital_delete->status->Lookup->toClientList() ?>;
fhospitaldelete.lists["x_status"].options = <?php echo JsonEncode($hospital_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hospital_delete->showPageHeader(); ?>
<?php
$hospital_delete->showMessage();
?>
<form name="fhospitaldelete" id="fhospitaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hospital_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hospital_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hospital">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hospital_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hospital->id->Visible) { // id ?>
		<th class="<?php echo $hospital->id->headerCellClass() ?>"><span id="elh_hospital_id" class="hospital_id"><?php echo $hospital->id->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
		<th class="<?php echo $hospital->hospital->headerCellClass() ?>"><span id="elh_hospital_hospital" class="hospital_hospital"><?php echo $hospital->hospital->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
		<th class="<?php echo $hospital->street->headerCellClass() ?>"><span id="elh_hospital_street" class="hospital_street"><?php echo $hospital->street->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
		<th class="<?php echo $hospital->area->headerCellClass() ?>"><span id="elh_hospital_area" class="hospital_area"><?php echo $hospital->area->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
		<th class="<?php echo $hospital->town->headerCellClass() ?>"><span id="elh_hospital_town" class="hospital_town"><?php echo $hospital->town->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
		<th class="<?php echo $hospital->province->headerCellClass() ?>"><span id="elh_hospital_province" class="hospital_province"><?php echo $hospital->province->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $hospital->postal_code->headerCellClass() ?>"><span id="elh_hospital_postal_code" class="hospital_postal_code"><?php echo $hospital->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
		<th class="<?php echo $hospital->phone_no->headerCellClass() ?>"><span id="elh_hospital_phone_no" class="hospital_phone_no"><?php echo $hospital->phone_no->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
		<th class="<?php echo $hospital->status->headerCellClass() ?>"><span id="elh_hospital_status" class="hospital_status"><?php echo $hospital->status->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
		<th class="<?php echo $hospital->PreFixCode->headerCellClass() ?>"><span id="elh_hospital_PreFixCode" class="hospital_PreFixCode"><?php echo $hospital->PreFixCode->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
		<th class="<?php echo $hospital->BillingGST->headerCellClass() ?>"><span id="elh_hospital_BillingGST" class="hospital_BillingGST"><?php echo $hospital->BillingGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
		<th class="<?php echo $hospital->pharmacyGST->headerCellClass() ?>"><span id="elh_hospital_pharmacyGST" class="hospital_pharmacyGST"><?php echo $hospital->pharmacyGST->caption() ?></span></th>
<?php } ?>
<?php if ($hospital->Country->Visible) { // Country ?>
		<th class="<?php echo $hospital->Country->headerCellClass() ?>"><span id="elh_hospital_Country" class="hospital_Country"><?php echo $hospital->Country->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hospital_delete->RecCnt = 0;
$i = 0;
while (!$hospital_delete->Recordset->EOF) {
	$hospital_delete->RecCnt++;
	$hospital_delete->RowCnt++;

	// Set row properties
	$hospital->resetAttributes();
	$hospital->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hospital_delete->loadRowValues($hospital_delete->Recordset);

	// Render row
	$hospital_delete->renderRow();
?>
	<tr<?php echo $hospital->rowAttributes() ?>>
<?php if ($hospital->id->Visible) { // id ?>
		<td<?php echo $hospital->id->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_id" class="hospital_id">
<span<?php echo $hospital->id->viewAttributes() ?>>
<?php echo $hospital->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->hospital->Visible) { // hospital ?>
		<td<?php echo $hospital->hospital->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_hospital" class="hospital_hospital">
<span<?php echo $hospital->hospital->viewAttributes() ?>>
<?php echo $hospital->hospital->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->street->Visible) { // street ?>
		<td<?php echo $hospital->street->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_street" class="hospital_street">
<span<?php echo $hospital->street->viewAttributes() ?>>
<?php echo $hospital->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->area->Visible) { // area ?>
		<td<?php echo $hospital->area->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_area" class="hospital_area">
<span<?php echo $hospital->area->viewAttributes() ?>>
<?php echo $hospital->area->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->town->Visible) { // town ?>
		<td<?php echo $hospital->town->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_town" class="hospital_town">
<span<?php echo $hospital->town->viewAttributes() ?>>
<?php echo $hospital->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->province->Visible) { // province ?>
		<td<?php echo $hospital->province->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_province" class="hospital_province">
<span<?php echo $hospital->province->viewAttributes() ?>>
<?php echo $hospital->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->postal_code->Visible) { // postal_code ?>
		<td<?php echo $hospital->postal_code->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_postal_code" class="hospital_postal_code">
<span<?php echo $hospital->postal_code->viewAttributes() ?>>
<?php echo $hospital->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->phone_no->Visible) { // phone_no ?>
		<td<?php echo $hospital->phone_no->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_phone_no" class="hospital_phone_no">
<span<?php echo $hospital->phone_no->viewAttributes() ?>>
<?php echo $hospital->phone_no->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->status->Visible) { // status ?>
		<td<?php echo $hospital->status->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_status" class="hospital_status">
<span<?php echo $hospital->status->viewAttributes() ?>>
<?php echo $hospital->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->PreFixCode->Visible) { // PreFixCode ?>
		<td<?php echo $hospital->PreFixCode->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_PreFixCode" class="hospital_PreFixCode">
<span<?php echo $hospital->PreFixCode->viewAttributes() ?>>
<?php echo $hospital->PreFixCode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->BillingGST->Visible) { // BillingGST ?>
		<td<?php echo $hospital->BillingGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_BillingGST" class="hospital_BillingGST">
<span<?php echo $hospital->BillingGST->viewAttributes() ?>>
<?php echo $hospital->BillingGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->pharmacyGST->Visible) { // pharmacyGST ?>
		<td<?php echo $hospital->pharmacyGST->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_pharmacyGST" class="hospital_pharmacyGST">
<span<?php echo $hospital->pharmacyGST->viewAttributes() ?>>
<?php echo $hospital->pharmacyGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hospital->Country->Visible) { // Country ?>
		<td<?php echo $hospital->Country->cellAttributes() ?>>
<span id="el<?php echo $hospital_delete->RowCnt ?>_hospital_Country" class="hospital_Country">
<span<?php echo $hospital->Country->viewAttributes() ?>>
<?php echo $hospital->Country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hospital_delete->Recordset->moveNext();
}
$hospital_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hospital_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hospital_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hospital_delete->terminate();
?>