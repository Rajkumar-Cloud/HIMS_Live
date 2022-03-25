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
$op_admission_delete = new op_admission_delete();

// Run the page
$op_admission_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$op_admission_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fop_admissiondelete = currentForm = new ew.Form("fop_admissiondelete", "delete");

// Form_CustomValidate event
fop_admissiondelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fop_admissiondelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fop_admissiondelete.lists["x_patient_id"] = <?php echo $op_admission_delete->patient_id->Lookup->toClientList() ?>;
fop_admissiondelete.lists["x_patient_id"].options = <?php echo JsonEncode($op_admission_delete->patient_id->lookupOptions()) ?>;
fop_admissiondelete.lists["x_physician_id"] = <?php echo $op_admission_delete->physician_id->Lookup->toClientList() ?>;
fop_admissiondelete.lists["x_physician_id"].options = <?php echo JsonEncode($op_admission_delete->physician_id->lookupOptions()) ?>;
fop_admissiondelete.lists["x_status"] = <?php echo $op_admission_delete->status->Lookup->toClientList() ?>;
fop_admissiondelete.lists["x_status"].options = <?php echo JsonEncode($op_admission_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $op_admission_delete->showPageHeader(); ?>
<?php
$op_admission_delete->showMessage();
?>
<form name="fop_admissiondelete" id="fop_admissiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($op_admission_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $op_admission_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="op_admission">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($op_admission_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($op_admission->id->Visible) { // id ?>
		<th class="<?php echo $op_admission->id->headerCellClass() ?>"><span id="elh_op_admission_id" class="op_admission_id"><?php echo $op_admission->id->caption() ?></span></th>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $op_admission->patient_id->headerCellClass() ?>"><span id="elh_op_admission_patient_id" class="op_admission_patient_id"><?php echo $op_admission->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
		<th class="<?php echo $op_admission->physician_id->headerCellClass() ?>"><span id="elh_op_admission_physician_id" class="op_admission_physician_id"><?php echo $op_admission->physician_id->caption() ?></span></th>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
		<th class="<?php echo $op_admission->status->headerCellClass() ?>"><span id="elh_op_admission_status" class="op_admission_status"><?php echo $op_admission->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$op_admission_delete->RecCnt = 0;
$i = 0;
while (!$op_admission_delete->Recordset->EOF) {
	$op_admission_delete->RecCnt++;
	$op_admission_delete->RowCnt++;

	// Set row properties
	$op_admission->resetAttributes();
	$op_admission->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$op_admission_delete->loadRowValues($op_admission_delete->Recordset);

	// Render row
	$op_admission_delete->renderRow();
?>
	<tr<?php echo $op_admission->rowAttributes() ?>>
<?php if ($op_admission->id->Visible) { // id ?>
		<td<?php echo $op_admission->id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_delete->RowCnt ?>_op_admission_id" class="op_admission_id">
<span<?php echo $op_admission->id->viewAttributes() ?>>
<?php echo $op_admission->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($op_admission->patient_id->Visible) { // patient_id ?>
		<td<?php echo $op_admission->patient_id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_delete->RowCnt ?>_op_admission_patient_id" class="op_admission_patient_id">
<span<?php echo $op_admission->patient_id->viewAttributes() ?>>
<?php echo $op_admission->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($op_admission->physician_id->Visible) { // physician_id ?>
		<td<?php echo $op_admission->physician_id->cellAttributes() ?>>
<span id="el<?php echo $op_admission_delete->RowCnt ?>_op_admission_physician_id" class="op_admission_physician_id">
<span<?php echo $op_admission->physician_id->viewAttributes() ?>>
<?php echo $op_admission->physician_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($op_admission->status->Visible) { // status ?>
		<td<?php echo $op_admission->status->cellAttributes() ?>>
<span id="el<?php echo $op_admission_delete->RowCnt ?>_op_admission_status" class="op_admission_status">
<span<?php echo $op_admission->status->viewAttributes() ?>>
<?php echo $op_admission->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$op_admission_delete->Recordset->moveNext();
}
$op_admission_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $op_admission_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$op_admission_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$op_admission_delete->terminate();
?>