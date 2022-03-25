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
$hr_jobtitles_delete = new hr_jobtitles_delete();

// Run the page
$hr_jobtitles_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$hr_jobtitles_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fhr_jobtitlesdelete = currentForm = new ew.Form("fhr_jobtitlesdelete", "delete");

// Form_CustomValidate event
fhr_jobtitlesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fhr_jobtitlesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $hr_jobtitles_delete->showPageHeader(); ?>
<?php
$hr_jobtitles_delete->showMessage();
?>
<form name="fhr_jobtitlesdelete" id="fhr_jobtitlesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($hr_jobtitles_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $hr_jobtitles_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="hr_jobtitles">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($hr_jobtitles_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($hr_jobtitles->id->Visible) { // id ?>
		<th class="<?php echo $hr_jobtitles->id->headerCellClass() ?>"><span id="elh_hr_jobtitles_id" class="hr_jobtitles_id"><?php echo $hr_jobtitles->id->caption() ?></span></th>
<?php } ?>
<?php if ($hr_jobtitles->code->Visible) { // code ?>
		<th class="<?php echo $hr_jobtitles->code->headerCellClass() ?>"><span id="elh_hr_jobtitles_code" class="hr_jobtitles_code"><?php echo $hr_jobtitles->code->caption() ?></span></th>
<?php } ?>
<?php if ($hr_jobtitles->name->Visible) { // name ?>
		<th class="<?php echo $hr_jobtitles->name->headerCellClass() ?>"><span id="elh_hr_jobtitles_name" class="hr_jobtitles_name"><?php echo $hr_jobtitles->name->caption() ?></span></th>
<?php } ?>
<?php if ($hr_jobtitles->description->Visible) { // description ?>
		<th class="<?php echo $hr_jobtitles->description->headerCellClass() ?>"><span id="elh_hr_jobtitles_description" class="hr_jobtitles_description"><?php echo $hr_jobtitles->description->caption() ?></span></th>
<?php } ?>
<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
		<th class="<?php echo $hr_jobtitles->specification->headerCellClass() ?>"><span id="elh_hr_jobtitles_specification" class="hr_jobtitles_specification"><?php echo $hr_jobtitles->specification->caption() ?></span></th>
<?php } ?>
<?php if ($hr_jobtitles->HospID->Visible) { // HospID ?>
		<th class="<?php echo $hr_jobtitles->HospID->headerCellClass() ?>"><span id="elh_hr_jobtitles_HospID" class="hr_jobtitles_HospID"><?php echo $hr_jobtitles->HospID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$hr_jobtitles_delete->RecCnt = 0;
$i = 0;
while (!$hr_jobtitles_delete->Recordset->EOF) {
	$hr_jobtitles_delete->RecCnt++;
	$hr_jobtitles_delete->RowCnt++;

	// Set row properties
	$hr_jobtitles->resetAttributes();
	$hr_jobtitles->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$hr_jobtitles_delete->loadRowValues($hr_jobtitles_delete->Recordset);

	// Render row
	$hr_jobtitles_delete->renderRow();
?>
	<tr<?php echo $hr_jobtitles->rowAttributes() ?>>
<?php if ($hr_jobtitles->id->Visible) { // id ?>
		<td<?php echo $hr_jobtitles->id->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_id" class="hr_jobtitles_id">
<span<?php echo $hr_jobtitles->id->viewAttributes() ?>>
<?php echo $hr_jobtitles->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_jobtitles->code->Visible) { // code ?>
		<td<?php echo $hr_jobtitles->code->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_code" class="hr_jobtitles_code">
<span<?php echo $hr_jobtitles->code->viewAttributes() ?>>
<?php echo $hr_jobtitles->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_jobtitles->name->Visible) { // name ?>
		<td<?php echo $hr_jobtitles->name->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_name" class="hr_jobtitles_name">
<span<?php echo $hr_jobtitles->name->viewAttributes() ?>>
<?php echo $hr_jobtitles->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_jobtitles->description->Visible) { // description ?>
		<td<?php echo $hr_jobtitles->description->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_description" class="hr_jobtitles_description">
<span<?php echo $hr_jobtitles->description->viewAttributes() ?>>
<?php echo $hr_jobtitles->description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_jobtitles->specification->Visible) { // specification ?>
		<td<?php echo $hr_jobtitles->specification->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_specification" class="hr_jobtitles_specification">
<span<?php echo $hr_jobtitles->specification->viewAttributes() ?>>
<?php echo $hr_jobtitles->specification->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($hr_jobtitles->HospID->Visible) { // HospID ?>
		<td<?php echo $hr_jobtitles->HospID->cellAttributes() ?>>
<span id="el<?php echo $hr_jobtitles_delete->RowCnt ?>_hr_jobtitles_HospID" class="hr_jobtitles_HospID">
<span<?php echo $hr_jobtitles->HospID->viewAttributes() ?>>
<?php echo $hr_jobtitles->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$hr_jobtitles_delete->Recordset->moveNext();
}
$hr_jobtitles_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $hr_jobtitles_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$hr_jobtitles_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$hr_jobtitles_delete->terminate();
?>