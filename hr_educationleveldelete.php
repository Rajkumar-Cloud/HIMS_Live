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
$hr_educationlevel_delete = new hr_educationlevel_delete();

// Run the page
$hr_educationlevel_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_educationlevel_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_educationleveldelete = currentForm = new ew.Form("fhr_educationleveldelete", "delete");

// Form_CustomValidate event
fhr_educationleveldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_educationleveldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_educationlevel_delete->showPageHeader(); ?>
<?php
$hr_educationlevel_delete->showMessage();
?>
<form name="fhr_educationleveldelete" id="fhr_educationleveldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_educationlevel_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_educationlevel_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_educationlevel">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_educationlevel_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_educationlevel->id->Visible) { // id ?>
		<th class="<?php echo $hr_educationlevel->id->headerCellClass() ?>"><span id="elh_hr_educationlevel_id" class="hr_educationlevel_id"><?php echo $hr_educationlevel->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_educationlevel->name->Visible) { // name ?>
		<th class="<?php echo $hr_educationlevel->name->headerCellClass() ?>"><span id="elh_hr_educationlevel_name" class="hr_educationlevel_name"><?php echo $hr_educationlevel->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_educationlevel->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_educationlevel->HospID->headerCellClass() ?>"><span id="elh_hr_educationlevel_HospID" class="hr_educationlevel_HospID"><?php echo $hr_educationlevel->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_educationlevel_delete->RecCnt = 0;
$i = 0;
while (!$hr_educationlevel_delete->Recordset->EOF) {
	$hr_educationlevel_delete->RecCnt++;
	$hr_educationlevel_delete->RowCnt++;

	// Set row properties
	$hr_educationlevel->resetAttributes();
	$hr_educationlevel->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_educationlevel_delete->loadRowValues($hr_educationlevel_delete->Recordset);

	// Render row
	$hr_educationlevel_delete->renderRow();
?>
	<tr<?php echo $hr_educationlevel->rowAttributes() ?>>
<?php if ($hr_educationlevel->id->Visible) { // id ?>
		<td<?php echo $hr_educationlevel->id->cellAttributes() ?>>
<span id="el<?php echo $hr_educationlevel_delete->RowCnt ?>_hr_educationlevel_id" class="hr_educationlevel_id">
<span<?php echo $hr_educationlevel->id->viewAttributes() ?>>
<?php echo $hr_educationlevel->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_educationlevel->name->Visible) { // name ?>
		<td<?php echo $hr_educationlevel->name->cellAttributes() ?>>
<span id="el<?php echo $hr_educationlevel_delete->RowCnt ?>_hr_educationlevel_name" class="hr_educationlevel_name">
<span<?php echo $hr_educationlevel->name->viewAttributes() ?>>
<?php echo $hr_educationlevel->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_educationlevel->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_educationlevel->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_educationlevel_delete->RowCnt ?>_hr_educationlevel_HospID" class="hr_educationlevel_HospID">
<span<?php echo $hr_educationlevel->HospID->viewAttributes() ?>>
<?php echo $hr_educationlevel->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_educationlevel_delete->Recordset->moveNext();
}
$hr_educationlevel_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_educationlevel_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_educationlevel_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_educationlevel_delete->terminate();
?>