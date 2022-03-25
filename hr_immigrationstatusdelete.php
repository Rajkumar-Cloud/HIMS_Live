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
$hr_immigrationstatus_delete = new hr_immigrationstatus_delete();

// Run the page
$hr_immigrationstatus_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_immigrationstatus_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_immigrationstatusdelete = currentForm = new ew.Form("fhr_immigrationstatusdelete", "delete");

// Form_CustomValidate event
fhr_immigrationstatusdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_immigrationstatusdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_immigrationstatus_delete->showPageHeader(); ?>
<?php
$hr_immigrationstatus_delete->showMessage();
?>
<form name="fhr_immigrationstatusdelete" id="fhr_immigrationstatusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_immigrationstatus_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_immigrationstatus_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_immigrationstatus">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_immigrationstatus_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_immigrationstatus->id->Visible) { // id ?>
		<th class="<?php echo $hr_immigrationstatus->id->headerCellClass() ?>"><span id="elh_hr_immigrationstatus_id" class="hr_immigrationstatus_id"><?php echo $hr_immigrationstatus->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_immigrationstatus->name->Visible) { // name ?>
		<th class="<?php echo $hr_immigrationstatus->name->headerCellClass() ?>"><span id="elh_hr_immigrationstatus_name" class="hr_immigrationstatus_name"><?php echo $hr_immigrationstatus->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_immigrationstatus->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_immigrationstatus->HospID->headerCellClass() ?>"><span id="elh_hr_immigrationstatus_HospID" class="hr_immigrationstatus_HospID"><?php echo $hr_immigrationstatus->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_immigrationstatus_delete->RecCnt = 0;
$i = 0;
while (!$hr_immigrationstatus_delete->Recordset->EOF) {
	$hr_immigrationstatus_delete->RecCnt++;
	$hr_immigrationstatus_delete->RowCnt++;

	// Set row properties
	$hr_immigrationstatus->resetAttributes();
	$hr_immigrationstatus->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_immigrationstatus_delete->loadRowValues($hr_immigrationstatus_delete->Recordset);

	// Render row
	$hr_immigrationstatus_delete->renderRow();
?>
	<tr<?php echo $hr_immigrationstatus->rowAttributes() ?>>
<?php if ($hr_immigrationstatus->id->Visible) { // id ?>
		<td<?php echo $hr_immigrationstatus->id->cellAttributes() ?>>
<span id="el<?php echo $hr_immigrationstatus_delete->RowCnt ?>_hr_immigrationstatus_id" class="hr_immigrationstatus_id">
<span<?php echo $hr_immigrationstatus->id->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_immigrationstatus->name->Visible) { // name ?>
		<td<?php echo $hr_immigrationstatus->name->cellAttributes() ?>>
<span id="el<?php echo $hr_immigrationstatus_delete->RowCnt ?>_hr_immigrationstatus_name" class="hr_immigrationstatus_name">
<span<?php echo $hr_immigrationstatus->name->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_immigrationstatus->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_immigrationstatus->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_immigrationstatus_delete->RowCnt ?>_hr_immigrationstatus_HospID" class="hr_immigrationstatus_HospID">
<span<?php echo $hr_immigrationstatus->HospID->viewAttributes() ?>>
<?php echo $hr_immigrationstatus->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_immigrationstatus_delete->Recordset->moveNext();
}
$hr_immigrationstatus_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_immigrationstatus_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_immigrationstatus_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_immigrationstatus_delete->terminate();
?>