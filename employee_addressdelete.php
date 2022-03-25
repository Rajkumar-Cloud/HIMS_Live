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
$employee_address_delete = new employee_address_delete();

// Run the page
$employee_address_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_address_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_addressdelete = currentForm = new ew.Form("femployee_addressdelete", "delete");

// Form_CustomValidate event
femployee_addressdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_addressdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_addressdelete.lists["x_address_type"] = <?php echo $employee_address_delete->address_type->Lookup->toClientList() ?>;
femployee_addressdelete.lists["x_address_type"].options = <?php echo JsonEncode($employee_address_delete->address_type->lookupOptions()) ?>;
femployee_addressdelete.lists["x_status"] = <?php echo $employee_address_delete->status->Lookup->toClientList() ?>;
femployee_addressdelete.lists["x_status"].options = <?php echo JsonEncode($employee_address_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_address_delete->showPageHeader(); ?>
<?php
$employee_address_delete->showMessage();
?>
<form name="femployee_addressdelete" id="femployee_addressdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_address_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_address_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_address">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_address_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_address->id->Visible) { // id ?>
		<th class="<?php echo $employee_address->id->headerCellClass() ?>"><span id="elh_employee_address_id" class="employee_address_id"><?php echo $employee_address->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
		<th class="<?php echo $employee_address->employee_id->headerCellClass() ?>"><span id="elh_employee_address_employee_id" class="employee_address_employee_id"><?php echo $employee_address->employee_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
		<th class="<?php echo $employee_address->contact_persion->headerCellClass() ?>"><span id="elh_employee_address_contact_persion" class="employee_address_contact_persion"><?php echo $employee_address->contact_persion->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
		<th class="<?php echo $employee_address->street->headerCellClass() ?>"><span id="elh_employee_address_street" class="employee_address_street"><?php echo $employee_address->street->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
		<th class="<?php echo $employee_address->town->headerCellClass() ?>"><span id="elh_employee_address_town" class="employee_address_town"><?php echo $employee_address->town->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
		<th class="<?php echo $employee_address->province->headerCellClass() ?>"><span id="elh_employee_address_province" class="employee_address_province"><?php echo $employee_address->province->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
		<th class="<?php echo $employee_address->postal_code->headerCellClass() ?>"><span id="elh_employee_address_postal_code" class="employee_address_postal_code"><?php echo $employee_address->postal_code->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
		<th class="<?php echo $employee_address->address_type->headerCellClass() ?>"><span id="elh_employee_address_address_type" class="employee_address_address_type"><?php echo $employee_address->address_type->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
		<th class="<?php echo $employee_address->status->headerCellClass() ?>"><span id="elh_employee_address_status" class="employee_address_status"><?php echo $employee_address->status->caption() ?></span></th>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
		<th class="<?php echo $employee_address->HospID->headerCellClass() ?>"><span id="elh_employee_address_HospID" class="employee_address_HospID"><?php echo $employee_address->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_address_delete->RecCnt = 0;
$i = 0;
while (!$employee_address_delete->Recordset->EOF) {
	$employee_address_delete->RecCnt++;
	$employee_address_delete->RowCnt++;

	// Set row properties
	$employee_address->resetAttributes();
	$employee_address->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_address_delete->loadRowValues($employee_address_delete->Recordset);

	// Render row
	$employee_address_delete->renderRow();
?>
	<tr<?php echo $employee_address->rowAttributes() ?>>
<?php if ($employee_address->id->Visible) { // id ?>
		<td<?php echo $employee_address->id->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_id" class="employee_address_id">
<span<?php echo $employee_address->id->viewAttributes() ?>>
<?php echo $employee_address->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->employee_id->Visible) { // employee_id ?>
		<td<?php echo $employee_address->employee_id->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_employee_id" class="employee_address_employee_id">
<span<?php echo $employee_address->employee_id->viewAttributes() ?>>
<?php echo $employee_address->employee_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->contact_persion->Visible) { // contact_persion ?>
		<td<?php echo $employee_address->contact_persion->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_contact_persion" class="employee_address_contact_persion">
<span<?php echo $employee_address->contact_persion->viewAttributes() ?>>
<?php echo $employee_address->contact_persion->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->street->Visible) { // street ?>
		<td<?php echo $employee_address->street->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_street" class="employee_address_street">
<span<?php echo $employee_address->street->viewAttributes() ?>>
<?php echo $employee_address->street->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->town->Visible) { // town ?>
		<td<?php echo $employee_address->town->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_town" class="employee_address_town">
<span<?php echo $employee_address->town->viewAttributes() ?>>
<?php echo $employee_address->town->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->province->Visible) { // province ?>
		<td<?php echo $employee_address->province->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_province" class="employee_address_province">
<span<?php echo $employee_address->province->viewAttributes() ?>>
<?php echo $employee_address->province->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->postal_code->Visible) { // postal_code ?>
		<td<?php echo $employee_address->postal_code->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_postal_code" class="employee_address_postal_code">
<span<?php echo $employee_address->postal_code->viewAttributes() ?>>
<?php echo $employee_address->postal_code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->address_type->Visible) { // address_type ?>
		<td<?php echo $employee_address->address_type->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_address_type" class="employee_address_address_type">
<span<?php echo $employee_address->address_type->viewAttributes() ?>>
<?php echo $employee_address->address_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->status->Visible) { // status ?>
		<td<?php echo $employee_address->status->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_status" class="employee_address_status">
<span<?php echo $employee_address->status->viewAttributes() ?>>
<?php echo $employee_address->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_address->HospID->Visible) { // HospID ?>
		<td<?php echo $employee_address->HospID->cellAttributes() ?>>
<span id="el<?php echo $employee_address_delete->RowCnt ?>_employee_address_HospID" class="employee_address_HospID">
<span<?php echo $employee_address->HospID->viewAttributes() ?>>
<?php echo $employee_address->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_address_delete->Recordset->moveNext();
}
$employee_address_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_address_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_address_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_address_delete->terminate();
?>