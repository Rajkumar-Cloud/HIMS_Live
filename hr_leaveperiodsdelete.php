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
$hr_leaveperiods_delete = new hr_leaveperiods_delete();

// Run the page
$hr_leaveperiods_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_leaveperiods_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_leaveperiodsdelete = currentForm = new ew.Form("fhr_leaveperiodsdelete", "delete");

// Form_CustomValidate event
fhr_leaveperiodsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_leaveperiodsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fhr_leaveperiodsdelete.lists["x_status"] = <?php echo $hr_leaveperiods_delete->status->Lookup->toClientList() ?>;
fhr_leaveperiodsdelete.lists["x_status"].options = <?php echo JsonEncode($hr_leaveperiods_delete->status->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_leaveperiods_delete->showPageHeader(); ?>
<?php
$hr_leaveperiods_delete->showMessage();
?>
<form name="fhr_leaveperiodsdelete" id="fhr_leaveperiodsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_leaveperiods_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_leaveperiods_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_leaveperiods">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_leaveperiods_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_leaveperiods->id->Visible) { // id ?>
		<th class="<?php echo $hr_leaveperiods->id->headerCellClass() ?>"><span id="elh_hr_leaveperiods_id" class="hr_leaveperiods_id"><?php echo $hr_leaveperiods->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leaveperiods->name->Visible) { // name ?>
		<th class="<?php echo $hr_leaveperiods->name->headerCellClass() ?>"><span id="elh_hr_leaveperiods_name" class="hr_leaveperiods_name"><?php echo $hr_leaveperiods->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
		<th class="<?php echo $hr_leaveperiods->date_start->headerCellClass() ?>"><span id="elh_hr_leaveperiods_date_start" class="hr_leaveperiods_date_start"><?php echo $hr_leaveperiods->date_start->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
		<th class="<?php echo $hr_leaveperiods->date_end->headerCellClass() ?>"><span id="elh_hr_leaveperiods_date_end" class="hr_leaveperiods_date_end"><?php echo $hr_leaveperiods->date_end->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
		<th class="<?php echo $hr_leaveperiods->status->headerCellClass() ?>"><span id="elh_hr_leaveperiods_status" class="hr_leaveperiods_status"><?php echo $hr_leaveperiods->status->caption() ?></span></th>
<?php } ?>
<?php if ($hr_leaveperiods->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_leaveperiods->HospID->headerCellClass() ?>"><span id="elh_hr_leaveperiods_HospID" class="hr_leaveperiods_HospID"><?php echo $hr_leaveperiods->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_leaveperiods_delete->RecCnt = 0;
$i = 0;
while (!$hr_leaveperiods_delete->Recordset->EOF) {
	$hr_leaveperiods_delete->RecCnt++;
	$hr_leaveperiods_delete->RowCnt++;

	// Set row properties
	$hr_leaveperiods->resetAttributes();
	$hr_leaveperiods->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_leaveperiods_delete->loadRowValues($hr_leaveperiods_delete->Recordset);

	// Render row
	$hr_leaveperiods_delete->renderRow();
?>
	<tr<?php echo $hr_leaveperiods->rowAttributes() ?>>
<?php if ($hr_leaveperiods->id->Visible) { // id ?>
		<td<?php echo $hr_leaveperiods->id->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_id" class="hr_leaveperiods_id">
<span<?php echo $hr_leaveperiods->id->viewAttributes() ?>>
<?php echo $hr_leaveperiods->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leaveperiods->name->Visible) { // name ?>
		<td<?php echo $hr_leaveperiods->name->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_name" class="hr_leaveperiods_name">
<span<?php echo $hr_leaveperiods->name->viewAttributes() ?>>
<?php echo $hr_leaveperiods->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leaveperiods->date_start->Visible) { // date_start ?>
		<td<?php echo $hr_leaveperiods->date_start->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_date_start" class="hr_leaveperiods_date_start">
<span<?php echo $hr_leaveperiods->date_start->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_start->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leaveperiods->date_end->Visible) { // date_end ?>
		<td<?php echo $hr_leaveperiods->date_end->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_date_end" class="hr_leaveperiods_date_end">
<span<?php echo $hr_leaveperiods->date_end->viewAttributes() ?>>
<?php echo $hr_leaveperiods->date_end->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leaveperiods->status->Visible) { // status ?>
		<td<?php echo $hr_leaveperiods->status->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_status" class="hr_leaveperiods_status">
<span<?php echo $hr_leaveperiods->status->viewAttributes() ?>>
<?php echo $hr_leaveperiods->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_leaveperiods->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_leaveperiods->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_leaveperiods_delete->RowCnt ?>_hr_leaveperiods_HospID" class="hr_leaveperiods_HospID">
<span<?php echo $hr_leaveperiods->HospID->viewAttributes() ?>>
<?php echo $hr_leaveperiods->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_leaveperiods_delete->Recordset->moveNext();
}
$hr_leaveperiods_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_leaveperiods_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_leaveperiods_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_leaveperiods_delete->terminate();
?>