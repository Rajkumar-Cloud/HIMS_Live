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
$patient_emergency_contact_delete = new patient_emergency_contact_delete();

// Run the page
$patient_emergency_contact_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_emergency_contact_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpatient_emergency_contactdelete = currentForm = new ew.Form("fpatient_emergency_contactdelete", "delete");

// Form_CustomValidate event
fpatient_emergency_contactdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_emergency_contactdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_emergency_contactdelete.lists["x_status"] = <?php echo $patient_emergency_contact_delete->status->Lookup->toClientList() ?>;
fpatient_emergency_contactdelete.lists["x_status"].options = <?php echo JsonEncode($patient_emergency_contact_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $patient_emergency_contact_delete->showPageHeader(); ?>
<?php
$patient_emergency_contact_delete->showMessage();
?>
<form name="fpatient_emergency_contactdelete" id="fpatient_emergency_contactdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_emergency_contact_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_emergency_contact_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_emergency_contact">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($patient_emergency_contact_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<th class="<?php echo $patient_emergency_contact->id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_id" class="patient_emergency_contact_id"><?php echo $patient_emergency_contact->id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $patient_emergency_contact->patient_id->headerCellClass() ?>"><span id="elh_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id"><?php echo $patient_emergency_contact->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<th class="<?php echo $patient_emergency_contact->name->headerCellClass() ?>"><span id="elh_patient_emergency_contact_name" class="patient_emergency_contact_name"><?php echo $patient_emergency_contact->name->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<th class="<?php echo $patient_emergency_contact->relationship->headerCellClass() ?>"><span id="elh_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship"><?php echo $patient_emergency_contact->relationship->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<th class="<?php echo $patient_emergency_contact->telephone->headerCellClass() ?>"><span id="elh_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone"><?php echo $patient_emergency_contact->telephone->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<th class="<?php echo $patient_emergency_contact->address->headerCellClass() ?>"><span id="elh_patient_emergency_contact_address" class="patient_emergency_contact_address"><?php echo $patient_emergency_contact->address->caption() ?></span></th>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<th class="<?php echo $patient_emergency_contact->status->headerCellClass() ?>"><span id="elh_patient_emergency_contact_status" class="patient_emergency_contact_status"><?php echo $patient_emergency_contact->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$patient_emergency_contact_delete->RecCnt = 0;
$i = 0;
while (!$patient_emergency_contact_delete->Recordset->EOF) {
	$patient_emergency_contact_delete->RecCnt++;
	$patient_emergency_contact_delete->RowCnt++;

	// Set row properties
	$patient_emergency_contact->resetAttributes();
	$patient_emergency_contact->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$patient_emergency_contact_delete->loadRowValues($patient_emergency_contact_delete->Recordset);

	// Render row
	$patient_emergency_contact_delete->renderRow();
?>
	<tr<?php echo $patient_emergency_contact->rowAttributes() ?>>
<?php if ($patient_emergency_contact->id->Visible) { // id ?>
		<td<?php echo $patient_emergency_contact->id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_id" class="patient_emergency_contact_id">
<span<?php echo $patient_emergency_contact->id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->patient_id->Visible) { // patient_id ?>
		<td<?php echo $patient_emergency_contact->patient_id->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_patient_id" class="patient_emergency_contact_patient_id">
<span<?php echo $patient_emergency_contact->patient_id->viewAttributes() ?>>
<?php echo $patient_emergency_contact->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->name->Visible) { // name ?>
		<td<?php echo $patient_emergency_contact->name->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_name" class="patient_emergency_contact_name">
<span<?php echo $patient_emergency_contact->name->viewAttributes() ?>>
<?php echo $patient_emergency_contact->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->relationship->Visible) { // relationship ?>
		<td<?php echo $patient_emergency_contact->relationship->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_relationship" class="patient_emergency_contact_relationship">
<span<?php echo $patient_emergency_contact->relationship->viewAttributes() ?>>
<?php echo $patient_emergency_contact->relationship->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->telephone->Visible) { // telephone ?>
		<td<?php echo $patient_emergency_contact->telephone->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_telephone" class="patient_emergency_contact_telephone">
<span<?php echo $patient_emergency_contact->telephone->viewAttributes() ?>>
<?php echo $patient_emergency_contact->telephone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->address->Visible) { // address ?>
		<td<?php echo $patient_emergency_contact->address->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_address" class="patient_emergency_contact_address">
<span<?php echo $patient_emergency_contact->address->viewAttributes() ?>>
<?php echo $patient_emergency_contact->address->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($patient_emergency_contact->status->Visible) { // status ?>
		<td<?php echo $patient_emergency_contact->status->cellAttributes() ?>>
<span id="el<?php echo $patient_emergency_contact_delete->RowCnt ?>_patient_emergency_contact_status" class="patient_emergency_contact_status">
<span<?php echo $patient_emergency_contact->status->viewAttributes() ?>>
<?php echo $patient_emergency_contact->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$patient_emergency_contact_delete->Recordset->moveNext();
}
$patient_emergency_contact_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $patient_emergency_contact_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$patient_emergency_contact_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$patient_emergency_contact_delete->terminate();
?>